<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Enums;

enum ContactType: string
{
	case Email = 'email';
	case MobilePhone = 'mobile';
	case Phone = 'phone';
	case Fax = 'fax';
	case Website = 'website';
	case Twitter = 'twitter';
	case Skype = 'skype';
	case Pager = 'pager';
}
