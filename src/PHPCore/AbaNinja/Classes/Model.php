<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Classes;

use BackedEnum;
use DateTime;
use PHPCore\AbaNinja\Exceptions\RuntimeException;
use PHPCore\AbaNinja\Interfaces\IModel;
use ReflectionClass;
use ReflectionProperty;
use stdClass;
use Throwable;

class Model implements IModel
{
	/**
	 * @throws RuntimeException
	 */
	public static function getResourceUri(): string
	{
		throw new RuntimeException(__FUNCTION__ . ' was not implemented in ' . static::class);
	}

	public static function getSubKey(): ?string
	{
		return null;
	}

	/** @var ReflectionClass[] */
	private static array $reflections = [];
	private static array $constructorData = [];
	private static array $propertyTypes = [];

	/**
	 * @throws \ReflectionException
	 * @throws RuntimeException
	 * @throws Throwable
	 */
	public static function createFromData(array|stdClass $fromData = []): static
	{
		try {
			$constructorData = [];
			$fromDataArray = (array)$fromData;
			foreach (self::getConstructorDataItems(true) as $constructorDataItem) {
				$constructorDataItemName = $constructorDataItem->getName();
				$constructorDataItemValue = $fromDataArray[$constructorDataItemName]
					?? $fromDataArray[Helper::camel_to_snake($constructorDataItemName)]
					?? null;
				if (
					!empty($constructorDataItemValue)
					&& !empty($type = $constructorDataItem->getType())
					&& method_exists($type, 'getName')
					&& !empty($typeName = $type->getName())
				) {
					if (is_subclass_of($typeName, Model::class)) {
						/** @var IModel|string $modelClass */
						$modelClass = $typeName;
						$constructorDataItemValue = $modelClass::createFromData($constructorDataItemValue);
					} else if (is_subclass_of($typeName, BackedEnum::class)) {
						$constructorDataItemValue = $typeName::from($constructorDataItemValue);
					} else if (
						$typeName === DateTime::class
						|| is_subclass_of($typeName, DateTime::class)
					) {
						$constructorDataItemValue = empty($dateValue = DateTime::createFromFormat('Y-m-d', $constructorDataItemValue))
							? null
							: $dateValue;
					}
					$constructorData[$constructorDataItemName] = $constructorDataItemValue;
				}
			}
			if (empty($constructorData)) {
				$self = new static();
			} else {
				$constructorDataString = '';
				foreach ($constructorData as $constructorDataItemName => $constructorDataItem) {
					$constructorDataItemVarName = '$__constructorDataVar_' . $constructorDataItemName;
					eval($constructorDataItemVarName . ' = $constructorDataItem;');
					$constructorDataString .= $constructorDataItemName . ': ' . $constructorDataItemVarName . ',' . PHP_EOL;
				}
				eval(
					'$self = new static(
					' . $constructorDataString . '
				);'
				);
			}

			$propertyTypes = self::getPropertyTypes();
			foreach ((array)$fromData as $key => $value) {
				if (static::getReflectionClass()->hasProperty($camelKey = Helper::snakeToCamel($key))) {
					$propertyType = $propertyTypes[$camelKey];
					$finalValue = (empty($propertyType)
						? $value
						: (str_ends_with($propertyType, '[]')
							? Helper::arrayToValueArray(
								$value,
								(is_subclass_of(
									$className = '\\PHPCore\\AbaNinja\\Models\\' . ($propertyType = (substr($propertyType, 0, strlen($propertyType) - 2))),
									Model::class
								)
									? $className
									: $propertyType
								)
							)
							: (is_subclass_of($propertyType, Model::class) || is_subclass_of($propertyType, BackedEnum::class)
								? (is_null($value)
									? null
									: ($propertyType::tryFrom($value) ?? Helper::returnNullOrDumpOnDebug([
										'propertyType' => $propertyType,
										'value'        => $value,
									]))
								)
								: ($propertyType === DateTime::class
									? (empty($value) || empty($value = DateTime::createFromFormat('Y-m-d', $value)) ? null : $value)
									: $value
								)
							)
						)
					);
					if (
						is_null($finalValue)
						&& !static::getReflectionClass()->getProperty($camelKey)->getType()->allowsNull()
					) {
						if (Helper::isDebug()) {
							var_dump($fromData);
							Helper::returnNullOrDumpOnDebug('"' . $camelKey . '" in ' . static::class . ' cannot be null!');
						}
						throw new RuntimeException('"' . $camelKey . '" cannot be null');
					}
					$self->__setValue($camelKey, $finalValue);
				}
			}
		} catch (Throwable $throwable) {
			Helper::dumpAndDieOnDebug($throwable);
			throw $throwable;
		}

		return $self;
	}

	public function __getValue(string $key): mixed
	{
		return $this->{$key};
	}

	public function __setValue(string $key, mixed $value): self
	{
		$this->{$key} = $value;
		return $this;
	}

	private static function getReflectionClass(): ReflectionClass
	{
		return self::$reflections[static::class]
			?? self::$reflections[static::class] = new ReflectionClass(static::class);
	}

	/**
	 * @param bool $showNullables
	 *
	 * @return \ReflectionParameter[]
	 */
	private static function getConstructorDataItems(bool $showNullables = false): array
	{
		return self::$constructorData[static::class]
			?? self::$constructorData[static::class] = (
			empty($constructor = static::getReflectionClass()->getConstructor())
				? []
				: array_filter(
				array_map(function (\ReflectionParameter $refProperty) use ($showNullables) {
					if (!$showNullables && $refProperty->allowsNull()) {
						return null;
					}
					return $refProperty;
				}, $constructor->getParameters())
			)
			);
	}

	private static function getPropertyTypes(): array
	{
		return self::$propertyTypes[static::class]
			?? self::$propertyTypes[static::class] = array_combine(
				array_map(function (ReflectionProperty $refProperty) {
					return $refProperty->getName();
				}, $properties = static::getReflectionClass()->getProperties()),
				array_map(function (ReflectionProperty $refProperty) {
					if (empty($refProperty->getDocComment())) {
						if (empty($type = $refProperty->getType()) || !method_exists($type, 'getName')) {
							return null;
						}
						return $refProperty->getType()->getName();
					}
					if (preg_match('/@var\s+(\S+)/', $refProperty->getDocComment(), $matches)) {
						[, $type] = $matches;
						return $type;
					}
					return null;
				}, $properties)
			);
	}

	/**
	 * @throws \ReflectionException
	 * @throws RuntimeException
	 */
	public static function from(array|stdClass $fromData, bool $fromMany = false): static
	{
		if (!$fromMany && !empty($subKey = static::getSubKey())) {
			$fromData = $fromData->{$subKey}[0];
		}
		return static::createFromData($fromData);
	}

	public static function tryFrom(array|stdClass $fromData, bool $fromMany = false): ?static
	{
		if (!$fromMany && !empty($subKey = static::getSubKey())) {
			$fromData = $fromData->{$subKey}[0];
		}
		try {
			return static::createFromData($fromData);
		} catch (Throwable $throwable) {
			return Helper::returnNullOrDumpOnDebug($throwable->getMessage());
		}
	}

	/**
	 * @param array $fromListData
	 *
	 * @return static[]
	 * @throws RuntimeException
	 * @throws \ReflectionException
	 */
	public static function fromMany(mixed $fromListData): array
	{
		$fromListData = (array)$fromListData;
		if (!empty($subKey = static::getSubKey())) {
			$fromListData = $fromListData[$subKey];
		}
		return array_map(function (array|stdClass $fromData) {
			return static::from($fromData, true);
		}, $fromListData);
	}

	/* create data */

	/**
	 * @param IModel[] $arrayOfModel
	 *
	 * @return array
	 */
	public static function getCreateDataArray(array $arrayOfModel): array
	{
		return array_map(function (IModel $model) {
			return $model->getCreateData();
		}, $arrayOfModel);
	}

	public function getCreateData(array $extraData = []): array
	{
		throw new RuntimeException(__FUNCTION__ . ' was not implemented for ' . static::class);
	}
}
