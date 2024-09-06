<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       2.9.2024
 */

namespace PHPCore\AbaNinja\Enums;

enum PositionKind: string
{
	case Product = 'product';
	case SectionTotal = 'section_total';
	case Divider = 'divider';
	case Group = 'group';
}
