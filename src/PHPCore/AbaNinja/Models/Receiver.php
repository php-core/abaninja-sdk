<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class Receiver extends Model
{
	protected string $addressUuid;
	protected ?string $companyUuid;
	protected ?string $personUuid;
	protected string $customerNumber;
	protected ?string $email;
	protected string $name;

	public function getAddressUuid(): string
	{
		return $this->addressUuid;
	}

	public function setAddressUuid(string $addressUuid): Receiver
	{
		$this->addressUuid = $addressUuid;
		return $this;
	}

	public function getCompanyUuid(): string
	{
		return $this->companyUuid;
	}

	public function setCompanyUuid(string $companyUuid): Receiver
	{
		$this->companyUuid = $companyUuid;
		return $this;
	}

	public function getCustomerNumber(): string
	{
		return $this->customerNumber;
	}

	public function setCustomerNumber(string $customerNumber): Receiver
	{
		$this->customerNumber = $customerNumber;
		return $this;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function setEmail(string $email): Receiver
	{
		$this->email = $email;
		return $this;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): Receiver
	{
		$this->name = $name;
		return $this;
	}

	public function getPersonUuid(): string
	{
		return $this->personUuid;
	}

	public function setPersonUuid(string $personUuid): Receiver
	{
		$this->personUuid = $personUuid;
		return $this;
	}
}
