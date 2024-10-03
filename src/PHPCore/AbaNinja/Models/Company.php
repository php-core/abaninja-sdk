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

class Company extends Model
{
	public static function getResourceUri(): string
	{
		return 'companies';
	}

	public function __construct(
		protected AddressType   $type,
		protected ?string       $name = null,
		protected ?string       $currencyCode = null,
		protected ?string       $customerNumber = null,
		protected ?string       $language = null,
		protected ?string       $vatNumber = null,
		protected ?string       $idNumber = null,

		/** @var ContactPerson[] $contactPersons */
		protected array         $contactPersons = [],

		/** @var string[] $tags */
		protected array         $tags = [],

		/** @var Contact[] $contacts */
		protected array         $contacts = [],

		/** @var Address[] $addresses */
		protected array         $addresses = [],

		protected ?string       $privateNotes = null,
		protected bool          $automaticDunning = false,
		protected ?PaymentTerms $paymentTerms = null,
		protected ?string       $uuid = null,
	)
	{
		if ($this->paymentTerms === null) {
			$this->paymentTerms = PaymentTerms::None;
		}
	}

	public function getCreateData(array $extraData = []): array
	{
		return [
			'type'              => $this->type,
			'customer_number'   => $this->customerNumber,
			'name'              => $this->name,
			'id_number'         => $this->idNumber,
			'vat_number'        => $this->vatNumber,
			'currency_code'     => $this->currencyCode,
			'language'          => $this->language,
			'contacts'          => self::getCreateDataArray($this->contacts),
			'tags'              => $this->tags,
			'contact_persons'   => self::getCreateDataArray($this->contactPersons),
			'addresses'         => self::getCreateDataArray($this->addresses),
			'private_notes'     => $this->privateNotes,
			'automatic_dunning' => $this->automaticDunning,
			'payment_terms'     => $this->paymentTerms,
		];
	}

	/* getters and setters */

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
	public function setAddresses(array $addresses): Company
	{
		$this->addresses = $addresses;
		return $this;
	}

	public function isAutomaticDunning(): bool
	{
		return $this->automaticDunning;
	}

	public function setAutomaticDunning(bool $automaticDunning): Company
	{
		$this->automaticDunning = $automaticDunning;
		return $this;
	}

	/**
	 * @return ContactPerson[]
	 */
	public function getContactPersons(): array
	{
		return $this->contactPersons;
	}

	/**
	 * @param ContactPerson[] $contactPersons
	 *
	 * @return $this
	 */
	public function setContactPersons(array $contactPersons): Company
	{
		$this->contactPersons = $contactPersons;
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
	public function setContacts(array $contacts): Company
	{
		$this->contacts = $contacts;
		return $this;
	}

	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	public function setCurrencyCode(string $currencyCode): Company
	{
		$this->currencyCode = $currencyCode;
		return $this;
	}

	public function getCustomerNumber(): string
	{
		return $this->customerNumber;
	}

	public function setCustomerNumber(string $customerNumber): Company
	{
		$this->customerNumber = $customerNumber;
		return $this;
	}

	public function getIdNumber(): string
	{
		return $this->idNumber;
	}

	public function setIdNumber(string $idNumber): Company
	{
		$this->idNumber = $idNumber;
		return $this;
	}

	public function getLanguage(): string
	{
		return $this->language;
	}

	public function setLanguage(string $language): Company
	{
		$this->language = $language;
		return $this;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): Company
	{
		$this->name = $name;
		return $this;
	}

	public function getPaymentTerms(): ?PaymentTerms
	{
		return $this->paymentTerms;
	}

	public function setPaymentTerms(?PaymentTerms $paymentTerms): Company
	{
		$this->paymentTerms = $paymentTerms;
		return $this;
	}

	public function getPrivateNotes(): ?string
	{
		return $this->privateNotes;
	}

	public function setPrivateNotes(?string $privateNotes): Company
	{
		$this->privateNotes = $privateNotes;
		return $this;
	}

	public function getTags(): array
	{
		return $this->tags;
	}

	public function setTags(array $tags): Company
	{
		$this->tags = $tags;
		return $this;
	}

	public function getType(): AddressType
	{
		return $this->type;
	}

	public function setType(AddressType $type): Company
	{
		$this->type = $type;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): Company
	{
		$this->uuid = $uuid;
		return $this;
	}

	public function getVatNumber(): string
	{
		return $this->vatNumber;
	}

	public function setVatNumber(string $vatNumber): Company
	{
		$this->vatNumber = $vatNumber;
		return $this;
	}
}
