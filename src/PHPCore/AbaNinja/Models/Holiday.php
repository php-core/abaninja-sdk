<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class Holiday extends Model
{
	public static function getResourceUri(): string
	{
		return 'holidays';
	}

	protected ?string $uuid;
	protected \DateTime $date;
	protected bool $halfDay;
	protected ?string $countryCode;
	protected ?string $state;
	protected ?string $name;
	protected HolidayTranslations $translations;

	public function getCountryCode(): ?string
	{
		return $this->countryCode;
	}

	public function setCountryCode(?string $countryCode): Holiday
	{
		$this->countryCode = $countryCode;
		return $this;
	}

	public function getDate(): \DateTime
	{
		return $this->date;
	}

	public function setDate(\DateTime $date): Holiday
	{
		$this->date = $date;
		return $this;
	}

	public function isHalfDay(): bool
	{
		return $this->halfDay;
	}

	public function setHalfDay(bool $halfDay): Holiday
	{
		$this->halfDay = $halfDay;
		return $this;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): Holiday
	{
		$this->name = $name;
		return $this;
	}

	public function getState(): ?string
	{
		return $this->state;
	}

	public function setState(?string $state): Holiday
	{
		$this->state = $state;
		return $this;
	}

	public function getTranslations(): HolidayTranslations
	{
		return $this->translations;
	}

	public function setTranslations(HolidayTranslations $translations): Holiday
	{
		$this->translations = $translations;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): Holiday
	{
		$this->uuid = $uuid;
		return $this;
	}
}
