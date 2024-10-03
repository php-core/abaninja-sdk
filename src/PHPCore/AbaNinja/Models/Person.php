<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;
use PHPCore\AbaNinja\Enums\AddressType;
use PHPCore\AbaNinja\Enums\PaymentTerms;
use PHPCore\AbaNinja\Enums\Salutation;

class Person extends Model
{
	public static function getResourceUri(): string
	{
		return 'persons';
	}

	public function __construct(
		protected AddressType   $type,
		protected string        $firstName,
		protected string        $lastName,
		protected Salutation    $salutation,
		protected string        $currencyCode,
		protected string        $language,

		/** @var Contact[] $contacts */
		protected array         $contacts,

		/** @var string[] $tags */
		protected array         $tags,

		/** @var Address[] $addresses */
		protected array         $addresses,

		protected bool          $automaticDunning = false,
		protected ?string       $privateNotes = null,
		protected ?PaymentTerms $paymentTerms = null,
		protected ?string       $uuid = null,
	) {}

	/* create data */

	public function getCreateData(array $extraData = []): array
	{
		return [
			'type'              => $this->type,
			'first_name'        => $this->firstName,
			'last_name'         => $this->lastName,
			'salutation'        => $this->salutation->value,
			'currency_code'     => $this->currencyCode,
			'language'          => $this->language,
			'tags'              => $this->tags,
			'contacts'          => self::getCreateDataArray($this->contacts),
			'addresses'         => self::getCreateDataArray($this->addresses),
			'private_notes'     => $this->privateNotes,
			'automatic_dunning' => $this->automaticDunning,
			'payment_terms'     => $this->paymentTerms,
		];
	}

	/* getter and setters */

	/**
	 * @return Address[]
	 */
	public function getAddresses(): array
	{
		return $this->addresses;
	}

	/**
	 * @param Address[] $addresses
	 *
	 * @return $this
	 */
	public function setAddresses(array $addresses): Person
	{
		$this->addresses = $addresses;
		return $this;
	}

	public function isAutomaticDunning(): bool
	{
		return $this->automaticDunning;
	}

	public function setAutomaticDunning(bool $automaticDunning): Person
	{
		$this->automaticDunning = $automaticDunning;
		return $this;
	}

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
	public function setContacts(array $contacts): Person
	{
		$this->contacts = $contacts;
		return $this;
	}

	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	public function setCurrencyCode(string $currencyCode): Person
	{
		$this->currencyCode = $currencyCode;
		return $this;
	}

	public function getFirstName(): string
	{
		return $this->firstName;
	}

	public function setFirstName(string $firstName): Person
	{
		$this->firstName = $firstName;
		return $this;
	}

	public function getLanguage(): string
	{
		return $this->language;
	}

	public function setLanguage(string $language): Person
	{
		$this->language = $language;
		return $this;
	}

	public function getLastName(): string
	{
		return $this->lastName;
	}

	public function setLastName(string $lastName): Person
	{
		$this->lastName = $lastName;
		return $this;
	}

	public function getPaymentTerms(): ?PaymentTerms
	{
		return $this->paymentTerms;
	}

	public function setPaymentTerms(?PaymentTerms $paymentTerms): Person
	{
		$this->paymentTerms = $paymentTerms;
		return $this;
	}

	public function getPrivateNotes(): ?string
	{
		return $this->privateNotes;
	}

	public function setPrivateNotes(?string $privateNotes): Person
	{
		$this->privateNotes = $privateNotes;
		return $this;
	}

	public function getSalutation(): Salutation
	{
		return $this->salutation;
	}

	public function setSalutation(Salutation $salutation): Person
	{
		$this->salutation = $salutation;
		return $this;
	}

	public function getTags(): array
	{
		return $this->tags;
	}

	public function setTags(array $tags): Person
	{
		$this->tags = $tags;
		return $this;
	}

	public function getType(): AddressType
	{
		return $this->type;
	}

	public function setType(AddressType $type): Person
	{
		$this->type = $type;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): Person
	{
		$this->uuid = $uuid;
		return $this;
	}
}
