<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Enums;

enum Salutation: string
{
	case Family = 'Family';
	case Mr = 'Mr';
	case Mrs = 'Mrs';
	case Ms = 'Ms';
}
