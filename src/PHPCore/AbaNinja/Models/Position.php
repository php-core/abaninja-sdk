<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;
use stdClass;

class Position extends Model
{
	protected int $positionNumber;
	protected string $kind;
	protected string $productNumber;
	protected string $productDescription;
	protected int $quantity;
	protected string $unitCode;
	protected int $singlePrice;
	protected int $positionTotal;
	protected ?Discount $discounts = null;
	protected Vat $vat;

	public function getDiscounts(): Discount
	{
		return $this->discounts;
	}

	public function setDiscounts(Discount $discounts): Position
	{
		$this->discounts = $discounts;
		return $this;
	}

	public function getKind(): string
	{
		return $this->kind;
	}

	public function setKind(string $kind): Position
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

	public function getPositionTotal(): int
	{
		return $this->positionTotal;
	}

	public function setPositionTotal(int $positionTotal): Position
	{
		$this->positionTotal = $positionTotal;
		return $this;
	}

	public function getProductDescription(): string
	{
		return $this->productDescription;
	}

	public function setProductDescription(string $productDescription): Position
	{
		$this->productDescription = $productDescription;
		return $this;
	}

	public function getProductNumber(): string
	{
		return $this->productNumber;
	}

	public function setProductNumber(string $productNumber): Position
	{
		$this->productNumber = $productNumber;
		return $this;
	}

	public function getQuantity(): int
	{
		return $this->quantity;
	}

	public function setQuantity(int $quantity): Position
	{
		$this->quantity = $quantity;
		return $this;
	}

	public function getSinglePrice(): int
	{
		return $this->singlePrice;
	}

	public function setSinglePrice(int $singlePrice): Position
	{
		$this->singlePrice = $singlePrice;
		return $this;
	}

	public function getUnitCode(): string
	{
		return $this->unitCode;
	}

	public function setUnitCode(string $unitCode): Position
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
