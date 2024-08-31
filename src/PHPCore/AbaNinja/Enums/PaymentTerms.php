<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Enums;

enum PaymentTerms: int
{
	case None = -1;
	case Days_7 = 7;
	case Days_10 = 10;
	case Days_14 = 14;
	case Days_15 = 15;
	case Days_20 = 20;
	case Days_30 = 30;
	case DAYS_60 = 60;
	case Days_90 = 90;
}
