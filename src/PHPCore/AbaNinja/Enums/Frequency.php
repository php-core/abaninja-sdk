<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Enums;

enum Frequency: string
{
	case Weekly = 'weekly';
	case Monthly = 'monthly';
	case SixMonths = 'six_months';
	case Annually = 'annually';
}
