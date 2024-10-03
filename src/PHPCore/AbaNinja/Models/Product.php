<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;
use PHPCore\AbaNinja\Exceptions\RuntimeException;

class Product extends Model
{
	public static function getResourceUri(): string
	{
		return 'products';
	}

	public function __construct(
		protected string               $productKey,
		protected ProductTranslations  $translations,
		protected string|float         $cost = 0,
		/** @var ProductProperty[] $properties */
		protected array                $properties = [],
		protected bool                 $isService = false,
		protected ?string              $unitUuid = null,
		protected ?int                 $productGroupNumber = null,
		/** @var string[] $tags */
		protected array                $tags = [],
		protected ?string              $eanCode = null,
		protected ?int                 $taxRate = null,
		protected null|int|string      $bookingAccountNumber = null,

		protected ?int                 $productId = null,
		protected ?string              $productUuid = null,
		protected ?ProductUnit         $productUnit = null,
		protected ?ProductProductGroup $productGroup = null,
		protected bool                 $isInclusive = false,
		protected ?\DateTime           $archivedAt = null
	) {}

	/**
	 * @throws RuntimeException
	 */
	public function getCreateData(array $extraData = []): array
	{
		return [
			'productKey'           => $this->productKey,
			'productGroupNumber'   => $this->productGroupNumber,
			'isService'            => $this->isService,
			'tags'                 => $this->tags,
			'translations'         => $this->translations->getCreateData(),
			'properties'           => self::getCreateDataArray($this->properties),
			'eanCode'              => $this->eanCode,
			'unitUuid'             => $this->unitUuid,
			'cost'                 => $this->cost,
			'taxRate'              => $this->taxRate,
			'bookingAccountNumber' => $this->bookingAccountNumber,
		];
	}

	/* getters and setters */

	public function getArchivedAt(): ?\DateTime
	{
		return $this->archivedAt;
	}

	public function setArchivedAt(?\DateTime $archivedAt): Product
	{
		$this->archivedAt = $archivedAt;
		return $this;
	}

	public function getBookingAccountNumber(): int
	{
		return $this->bookingAccountNumber;
	}

	public function setBookingAccountNumber(int $bookingAccountNumber): Product
	{
		$this->bookingAccountNumber = $bookingAccountNumber;
		return $this;
	}

	public function getCost(): string
	{
		return $this->cost;
	}

	public function setCost(string $cost): Product
	{
		$this->cost = $cost;
		return $this;
	}

	public function getEanCode(): ?string
	{
		return $this->eanCode;
	}

	public function setEanCode(?string $eanCode): Product
	{
		$this->eanCode = $eanCode;
		return $this;
	}

	public function isInclusive(): bool
	{
		return $this->isInclusive;
	}

	public function setIsInclusive(bool $isInclusive): Product
	{
		$this->isInclusive = $isInclusive;
		return $this;
	}

	public function isService(): bool
	{
		return $this->isService;
	}

	public function setIsService(bool $isService): Product
	{
		$this->isService = $isService;
		return $this;
	}

	public function getProductGroup(): ProductProductGroup
	{
		return $this->productGroup;
	}

	public function setProductGroup(ProductProductGroup $productGroup): Product
	{
		$this->productGroup = $productGroup;
		return $this;
	}

	public function getProductId(): int
	{
		return $this->productId;
	}

	public function setProductId(int $productId): Product
	{
		$this->productId = $productId;
		return $this;
	}

	public function getProductKey(): string
	{
		return $this->productKey;
	}

	public function setProductKey(string $productKey): Product
	{
		$this->productKey = $productKey;
		return $this;
	}

	public function getProductUnit(): ProductUnit
	{
		return $this->productUnit;
	}

	public function setProductUnit(ProductUnit $productUnit): Product
	{
		$this->productUnit = $productUnit;
		return $this;
	}

	public function getProductUuid(): string
	{
		return $this->productUuid;
	}

	public function setProductUuid(string $productUuid): Product
	{
		$this->productUuid = $productUuid;
		return $this;
	}

	public function getProperties(): array
	{
		return $this->properties;
	}

	public function setProperties(array $properties): Product
	{
		$this->properties = $properties;
		return $this;
	}

	public function getTags(): array
	{
		return $this->tags;
	}

	public function setTags(array $tags): Product
	{
		$this->tags = $tags;
		return $this;
	}

	public function getTaxRate(): ?int
	{
		return $this->taxRate;
	}

	public function setTaxRate(?int $taxRate): Product
	{
		$this->taxRate = $taxRate;
		return $this;
	}

	public function getTranslations(): ProductTranslations
	{
		return $this->translations;
	}

	public function setTranslations(ProductTranslations $translations): Product
	{
		$this->translations = $translations;
		return $this;
	}
}
