<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\TranslationsModel;

class UnitTranslations extends TranslationsModel
{
	public static function getTranslationKeys(): array
	{
		return ['unit', 'description', 'unitPlural'];
	}
}
