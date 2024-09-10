<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;
use PHPCore\AbaNinja\Enums\PositionKind;

class Position extends Model
{
	protected PositionKind $kind;
	protected int $positionNumber;
	protected ?string $productNumber = null;
	protected ?string $productDescription = null;
	protected ?string $title = null;
	protected ?float $quantity = null;
	protected ?string $unitCode = null;
	protected ?float $singlePrice = null;
	protected ?float $positionTotal = null;
	protected ?Discount $discounts = null;
	protected Vat $vat;

	/** @var self[] $items */
	protected array $items = [];

	public function getDiscounts(): ?Discount
	{
		return $this->discounts;
	}

	public function setDiscounts(?Discount $discounts): Position
	{
		$this->discounts = $discounts;
		return $this;
	}

	public function getItems(): array
	{
		return $this->items;
	}

	public function setItems(array $items): Position
	{
		$this->items = $items;
		return $this;
	}

	public function getKind(): PositionKind
	{
		return $this->kind;
	}

	public function setKind(PositionKind $kind): Position
	{
		$this->kind = $kind;
		return $this;
	}

	public function getPositionNumber(): int
	{
		return $this->positionNumber;
	}

	public function setPositionNumber(int $positionNumber): Position
	{
		$this->positionNumber = $positionNumber;
		return $this;
	}

	public function getPositionTotal(): ?float
	{
		return $this->positionTotal;
	}

	public function setPositionTotal(?float $positionTotal): Position
	{
		$this->positionTotal = $positionTotal;
		return $this;
	}

	public function getProductDescription(): ?string
	{
		return $this->productDescription;
	}

	public function setProductDescription(?string $productDescription): Position
	{
		$this->productDescription = $productDescription;
		return $this;
	}

	public function getProductNumber(): ?string
	{
		return $this->productNumber;
	}

	public function setProductNumber(?string $productNumber): Position
	{
		$this->productNumber = $productNumber;
		return $this;
	}

	public function getQuantity(): ?float
	{
		return $this->quantity;
	}

	public function setQuantity(?float $quantity): Position
	{
		$this->quantity = $quantity;
		return $this;
	}

	public function getSinglePrice(): ?float
	{
		return $this->singlePrice;
	}

	public function setSinglePrice(?float $singlePrice): Position
	{
		$this->singlePrice = $singlePrice;
		return $this;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(?string $title): Position
	{
		$this->title = $title;
		return $this;
	}

	public function getUnitCode(): ?string
	{
		return $this->unitCode;
	}

	public function setUnitCode(?string $unitCode): Position
	{
		$this->unitCode = $unitCode;
		return $this;
	}

	public function getVat(): Vat
	{
		return $this->vat;
	}

	public function setVat(Vat $vat): Position
	{
		$this->vat = $vat;
		return $this;
	}
}
