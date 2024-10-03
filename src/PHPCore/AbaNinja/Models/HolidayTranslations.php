<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\TranslationsModel;

class HolidayTranslations extends TranslationsModel
{
	public static function getTranslationKeys(): array
	{
		return ['name'];
	}
}
