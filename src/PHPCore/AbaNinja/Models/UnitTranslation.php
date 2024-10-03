<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       2.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class UnitTranslation extends Model
{
	public function __construct(
		protected string  $unit,
		protected string  $description = '',
		protected ?string $unitPlural = null
	) {}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDescription(string $description): UnitTranslation
	{
		$this->description = $description;
		return $this;
	}

	public function getUnit(): string
	{
		return $this->unit;
	}

	public function setUnit(string $unit): UnitTranslation
	{
		$this->unit = $unit;
		return $this;
	}

	public function getUnitPlural(): ?string
	{
		return $this->unitPlural;
	}

	public function setUnitPlural(?string $unitPlural): UnitTranslation
	{
		$this->unitPlural = $unitPlural;
		return $this;
	}
}
