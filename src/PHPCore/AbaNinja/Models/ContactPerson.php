<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;
use PHPCore\AbaNinja\Enums\AddressType;
use PHPCore\AbaNinja\Enums\Salutation;

class ContactPerson extends Model
{
	protected AddressType $type;
	protected string $uuid;
	protected string $firstName;
	protected string $lastName;
	protected Salutation $salutation;

	/** @var Contact[] $contacts */
	protected array $contacts;

	/**
	 * @return Contact[]
	 */
	public function getContacts(): array
	{
		return $this->contacts;
	}

	/**
	 * @param Contact[] $contacts
	 *
	 * @return $this
	 */
	public function setContacts(array $contacts): ContactPerson
	{
		$this->contacts = $contacts;
		return $this;
	}

	public function getFirstName(): string
	{
		return $this->firstName;
	}

	public function setFirstName(string $firstName): ContactPerson
	{
		$this->firstName = $firstName;
		return $this;
	}

	public function getLastName(): string
	{
		return $this->lastName;
	}

	public function setLastName(string $lastName): ContactPerson
	{
		$this->lastName = $lastName;
		return $this;
	}

	public function getSalutation(): Salutation
	{
		return $this->salutation;
	}

	public function setSalutation(Salutation $salutation): ContactPerson
	{
		$this->salutation = $salutation;
		return $this;
	}

	public function getType(): AddressType
	{
		return $this->type;
	}

	public function setType(AddressType $type): ContactPerson
	{
		$this->type = $type;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): ContactPerson
	{
		$this->uuid = $uuid;
		return $this;
	}

	/* create data */

	public function getCreateData(array $extraData = []): array
	{
		return [
			'first_name' => $this->firstName,
			'last_name'  => $this->lastName,
			'salutation' => $this->salutation,
			'contacts'   => self::getCreateDataArray($this->contacts),
		];
	}
}
