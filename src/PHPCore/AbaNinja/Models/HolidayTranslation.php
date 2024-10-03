<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class HolidayTranslation extends Model
{
	public function __construct(
		protected ?string $name = null
	) {}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): HolidayTranslation
	{
		$this->name = $name;
		return $this;
	}
}
