<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       2.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class Unit extends Model
{
	public static function getResourceUri(): string
	{
		return 'units';
	}

	public function __construct(
		protected bool             $active,
		protected UnitTranslations $translations,
		protected ?string          $isocode = null,
	) {}

	protected int $id;
	protected string $uuid;

	public function isActive(): bool
	{
		return $this->active;
	}

	public function setActive(bool $active): Unit
	{
		$this->active = $active;
		return $this;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): Unit
	{
		$this->id = $id;
		return $this;
	}

	public function getIsocode(): string
	{
		return $this->isocode;
	}

	public function setIsocode(string $isocode): Unit
	{
		$this->isocode = $isocode;
		return $this;
	}

	public function getTranslations(): UnitTranslations
	{
		return $this->translations;
	}

	public function setTranslations(UnitTranslations $translations): Unit
	{
		$this->translations = $translations;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): Unit
	{
		$this->uuid = $uuid;
		return $this;
	}
}
