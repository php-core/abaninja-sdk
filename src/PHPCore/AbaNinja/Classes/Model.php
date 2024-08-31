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
	private static array $propertyTypes = [];

	public function __construct(array|stdClass $fromData = [])
	{
		$propertyTypes = self::getPropertyTypes();
		foreach ((array)$fromData as $key => $value) {
			if (static::getReflectionClass()->hasProperty($camelKey = snakeToCamelPHPCoreAbaNinja($key))) {
				$propertyType = $propertyTypes[$camelKey];
				$finalValue = (empty($propertyType)
					? $value
					: (str_ends_with($propertyType, '[]')
						? arrayToValueArrayPHPCoreAbaNinja($value, (substr($propertyType, 0, strlen($propertyType) - 2)))
						: (is_subclass_of($propertyType, Model::class) || is_subclass_of($propertyType, BackedEnum::class)
							? (is_null($value)
								? null
								: ($propertyType::tryFrom($value) ?? returnNullOrDumpOnDebugPHPCoreAbaninja([
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
					if (isPHPCoreAbaNinjaDebug()) {
						var_dump($fromData);
						returnNullOrDumpOnDebugPHPCoreAbaninja('"' . $camelKey . '" on ' . static::class . ' cannot be null!');
					}
					throw new RuntimeException('"' . $camelKey . '" cannot be null');
				}
				$this->{$camelKey} = $finalValue;
			}
		}
	}

	private static function getReflectionClass(): ReflectionClass
	{
		return self::$reflections[static::class]
			?? self::$reflections[static::class] = new ReflectionClass(static::class);
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
						if (empty($refProperty->getType())) {
							return null;
						}
						return $refProperty->getType()->getName();
					}
					if (preg_match('/@var\s+(\S+)/', $refProperty->getDocComment(), $matches)) {
						[, $type] = $matches;
						return $type;
					}
				}, $properties)
			);
	}

	public static function from(array|stdClass $fromData, bool $fromMany = false): static
	{
		if (!$fromMany && !empty($subKey = static::getSubKey())) {
			$fromData = $fromData->{$subKey}[0];
		}
		return new static($fromData);
	}

	public static function tryFrom(array|stdClass $fromData, bool $fromMany = false): ?static
	{
		if (!$fromMany && !empty($subKey = static::getSubKey())) {
			$fromData = $fromData->{$subKey}[0];
		}
		try {
			return new static($fromData);
		} catch (Throwable $throwable) {
			return returnNullOrDumpOnDebugPHPCoreAbaninja($throwable->getMessage());
		}
	}

	/**
	 * @param array $fromListData
	 *
	 * @return static[]
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
}
