<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Enums;

use stdClass;

enum ProductAction: string
{
    case Archive = 'archive';
    case Delete = 'delete';

    public static function fromMany(stdClass|array $data): array
    {
        return array_map(function ($key) {
            return self::from($key);
        }, is_array($data)
            ? $data
            : array_keys((array)$data)
        );
    }
}
