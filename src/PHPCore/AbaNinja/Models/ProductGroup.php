<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\AbaNinja;
use PHPCore\AbaNinja\Classes\Model;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\ApiResponseException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;

class ProductGroup extends Model
{
	public static function getResourceUri(): string
	{
		return 'product-groups';
	}

	public function __construct(
		protected int                      $groupNumber,
		protected ProductGroupTranslations $translations,
		protected null|int|string          $bookingAccountNumber = null,

		protected ?string                  $uuid = null,
		protected bool                     $isArchived = false,
		protected bool                     $isDeletable = true
	) {}

	public function getCreateData(array $extraData = []): array
	{
		return [
			'groupNumber'          => $this->groupNumber,
			'bookingAccountNumber' => $this->bookingAccountNumber,
			'translations'         => $this->translations->getCreateData(),
		];
	}

	public static function create(
		int                      $groupNumber,
		ProductGroupTranslations $translations,
		null|int|string          $bookingAccountNumber = null,
	): static
	{
		return new static($groupNumber, $translations, $bookingAccountNumber);
	}

	/* static API shorthand functions */

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public static function get(string $uuid): self
	{
		return AbaNinja::ProductsApi()->getProductGroup($uuid);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public static function list(bool $onlyArchived = false): array
	{
		return AbaNinja::ProductsApi()->listProductGroups($onlyArchived);
	}

	/* API shorthand functions */

	/**
	 * @throws ApiResponseException
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function save(): self
	{
		return AbaNinja::ProductsApi()->update($this);
	}

	/* getters and setters */

	public function getGroupNumber(): int
	{
		return $this->groupNumber;
	}

	public function setGroupNumber(int $groupNumber): ProductGroup
	{
		$this->groupNumber = $groupNumber;
		return $this;
	}

	public function isArchived(): bool
	{
		return $this->isArchived;
	}

	public function setIsArchived(bool $isArchived): ProductGroup
	{
		$this->isArchived = $isArchived;
		return $this;
	}

	public function isDeletable(): bool
	{
		return $this->isDeletable;
	}

	public function setIsDeletable(bool $isDeletable): ProductGroup
	{
		$this->isDeletable = $isDeletable;
		return $this;
	}

	public function getTranslations(): ProductGroupTranslations
	{
		return $this->translations;
	}

	public function setTranslations(ProductGroupTranslations $translations): ProductGroup
	{
		$this->translations = $translations;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): ProductGroup
	{
		$this->uuid = $uuid;
		return $this;
	}

	public function getBookingAccountNumber(): int|string|null
	{
		return $this->bookingAccountNumber;
	}

	public function setBookingAccountNumber(int|string|null $bookingAccountNumber): ProductGroup
	{
		$this->bookingAccountNumber = $bookingAccountNumber;
		return $this;
	}
}
