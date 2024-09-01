<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class Address extends Model
{
	protected ?string $address = null;
	protected ?string $streetNumber = null;
	protected ?string $extension = null;
	protected ?string $additionalField = null;
	protected ?string $state = null;
	protected ?string $city = null;
	protected ?string $zipCode = null;
	protected string $countryCode = 'CH';

	public function getAdditionalField(): ?string
	{
		return $this->additionalField;
	}

	public function setAdditionalField(?string $additionalField): Address
	{
		$this->additionalField = $additionalField;
		return $this;
	}

	public function getAddress(): ?string
	{
		return $this->address;
	}

	public function setAddress(?string $address): Address
	{
		$this->address = $address;
		return $this;
	}

	public function getCity(): ?string
	{
		return $this->city;
	}

	public function setCity(?string $city): Address
	{
		$this->city = $city;
		return $this;
	}

	public function getCountryCode(): string
	{
		return $this->countryCode;
	}

	public function setCountryCode(string $countryCode): Address
	{
		$this->countryCode = $countryCode;
		return $this;
	}

	public function getExtension(): ?string
	{
		return $this->extension;
	}

	public function setExtension(?string $extension): Address
	{
		$this->extension = $extension;
		return $this;
	}

	public function getState(): ?string
	{
		return $this->state;
	}

	public function setState(?string $state): Address
	{
		$this->state = $state;
		return $this;
	}

	public function getStreetNumber(): ?string
	{
		return $this->streetNumber;
	}

	public function setStreetNumber(?string $streetNumber): Address
	{
		$this->streetNumber = $streetNumber;
		return $this;
	}

	public function getZipCode(): ?string
	{
		return $this->zipCode;
	}

	public function setZipCode(?string $zipCode): Address
	{
		$this->zipCode = $zipCode;
		return $this;
	}
}
