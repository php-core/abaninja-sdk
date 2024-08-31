<?php declare(strict_types=1);

/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

use PHPCore\AbaNinja\Classes\Model;

function camel_to_snake_PHPCoreAbaNinja(string $input): string
{
	return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
}

function snakeToCamelPHPCoreAbaNinja(string $input): string
{
	return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
}

function arrayToValueArrayPHPCoreAbaNinja(array $array, string $className): array
{
	return array_map(function ($item) use ($className) {
		return is_subclass_of($className, Model::class)
		|| is_subclass_of($className, BackedEnum::class)
			? $className::from($item)
			: $item;
	}, $array);
}

function isPHPCoreAbaNinjaDebug(): bool
{
	return defined('PHPCORE_ABANINJA_DEBUG') && PHPCORE_ABANINJA_DEBUG;
}

function returnNullOrDumpOnDebugPHPCoreAbaninja(mixed $data): mixed
{
	if (isPHPCoreAbaNinjaDebug()) {
		print PHP_EOL . PHP_EOL . '--- PHP-CORE-ABANINJA DEBUG BEGIN: ---' . PHP_EOL . PHP_EOL;
		var_dump($data);
		print PHP_EOL . PHP_EOL . '--- PHP-CORE-ABANINJA DEBUG END: ---' . PHP_EOL . PHP_EOL;
		die();
	}
	return null;
}
