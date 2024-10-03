<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       2.10.2024
 */

namespace PHPCore\AbaNinja\Classes;

use BackedEnum;

class Helper
{
	public static function camel_to_snake(string $input): string
	{
		return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
	}

	public static function snakeToCamel(string $input): string
	{
		return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
	}

	public static function arrayToValueArray(array $array, string $className): array
	{
		return array_map(function ($item) use ($className) {
			return is_subclass_of($className, Model::class)
			|| is_subclass_of($className, BackedEnum::class)
				? $className::from($item)
				: $item;
		}, $array);
	}

	public static function isDebug(): bool
	{
		return defined('PHPCORE_ABANINJA_DEBUG') && PHPCORE_ABANINJA_DEBUG;
	}

	public static function returnNullOrDumpOnDebug(mixed $data): mixed
	{
		if (self::isDebug()) {
			print PHP_EOL . PHP_EOL . '--- PHP-CORE-ABANINJA DEBUG BEGIN: ---' . PHP_EOL . PHP_EOL;
			self::dump($data);
			print PHP_EOL . PHP_EOL . '--- PHP-CORE-ABANINJA DEBUG END: ---' . PHP_EOL . PHP_EOL;
			die();
		}
		return null;
	}

	public static function dumpAndDieOnDebug(...$vars): void
	{
		self::dump($vars);
		if (self::isDebug()) {
			die();
		}
	}

	public static function dump(...$vars): void
	{
		if (function_exists('dump')) {
			dump($vars);
		} else {
			var_dump($vars);
		}
	}
}
