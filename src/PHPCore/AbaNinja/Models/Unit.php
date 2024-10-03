<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       2.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\AbaNinja;
use PHPCore\AbaNinja\Classes\ApiModel;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;

class Unit extends ApiModel
{
	public static function getResourceUri(): string
	{
		return 'units';
	}

	public function __construct(
		protected bool             $active,
		protected UnitTranslations $translations,
		protected ?string          $isocode = null,

		protected ?int             $id = null,
		protected ?string          $uuid = null,
	) {}

	public static function create(
		UnitTranslations $translations,
		?string          $isocode = null,
		bool             $active = true
	): static
	{
		return new static($active, $translations, $isocode);
	}

	public function getCreateData(array $extraData = []): array
	{
		return [
			'isocode'      => $this->isocode,
			'active'       => $this->active,
			'translations' => $this->translations->getCreateData(),
		];
	}

	/* static API shorthand functions */

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public static function get(string $uuid): static
	{
		return AbaNinja::UnitsApi()->getUnit($uuid);
	}

	/**
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public static function list(array $filters = []): array
	{
		return AbaNinja::UnitsApi()->listUnits();
	}

	/* getters and setters */

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
