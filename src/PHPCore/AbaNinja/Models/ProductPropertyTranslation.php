<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductPropertyTranslation extends Model
{
	protected string $description;
	protected string $unit;

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDescription(string $description): ProductPropertyTranslation
	{
		$this->description = $description;
		return $this;
	}

	public function getUnit(): string
	{
		return $this->unit;
	}

	public function setUnit(string $unit): ProductPropertyTranslation
	{
		$this->unit = $unit;
		return $this;
	}
}
