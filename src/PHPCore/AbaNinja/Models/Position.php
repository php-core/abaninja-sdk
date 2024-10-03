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
	public function __construct(
		protected PositionKind $kind,
		protected int          $positionNumber,
		protected ?string      $productNumber = null,
		protected ?string      $productDescription = null,
		protected ?string      $title = null,
		protected ?string      $text = null,
		protected ?float       $quantity = 1,
		protected ?string      $unitCode = 'C62',
		protected ?float       $singlePrice = null,
		protected ?float       $positionTotal = null,
		protected ?Discount    $discounts = null,
		protected ?Vat         $vat = null,
		/** @var self[] $items */
		protected array        $items = [],
		protected bool         $showCollapsed = true,
	) {}

	public function getCreateData(array $extraData = []): array
	{
		return array_merge([
			'kind'           => $this->kind->value,
			'positionNumber' => $this->positionNumber,
		], match ($this->kind) {
			PositionKind::Product => [
				'productNumber'      => $this->productNumber,
				'productDescription' => $this->productDescription,
				'quantity'           => $this->quantity,
				'unitCode'           => $this->unitCode,
				'singlePrice'        => $this->singlePrice,
				'positionTotal'      => $this->positionTotal,
				'discounts'          => $this->discounts->getCreateData(),
				'vat'                => $this->vat->getCreateData(),
			],
			PositionKind::Subtitle => [
				'title' => $this->title,
			],
			PositionKind::Text => [
				'text' => $this->text,
			],
			PositionKind::SectionTotal, PositionKind::Divider => [],
			PositionKind::Group => [
				'title'         => $this->title,
				'items'         => self::getCreateDataArray($this->items),
				'showCollapsed' => $this->showCollapsed,
			]
		});
	}

	/* static create helpers */

	public static function createProductPosition(
		int       $positionNumber,
		string    $productNumber,
		string    $productDescription,
		float     $singlePrice,
		float     $positionTotal,
		float     $quantity = 1,
		string    $unitCode = 'C62',
		?Discount $discount = null,
		?Vat      $vat = null,
	): Position
	{
		return new self(
			kind              : PositionKind::Product,
			positionNumber    : $positionNumber,
			productNumber     : $productNumber,
			productDescription: $productDescription,
			quantity          : $quantity,
			unitCode          : $unitCode,
			singlePrice       : $singlePrice,
			positionTotal     : $positionTotal,
			discounts         : $discount,
			vat               : $vat,
		);
	}

	public static function createSubtitlePosition(
		int    $positionNumber,
		string $title
	): self
	{
		return new self(
			kind          : PositionKind::Subtitle,
			positionNumber: $positionNumber,
			title         : $title
		);
	}

	public static function createTextPosition(
		int    $positionNumber,
		string $text
	): self
	{
		return new self(
			kind          : PositionKind::Subtitle,
			positionNumber: $positionNumber,
			text          : $text
		);
	}

	public static function createSectionTotalPosition(int $positionNumber): self
	{
		return new self(
			kind          : PositionKind::SectionTotal,
			positionNumber: $positionNumber
		);
	}

	public static function createDividerPosition(int $positionNumber): self
	{
		return new self(
			kind          : PositionKind::Divider,
			positionNumber: $positionNumber
		);
	}

	public static function createGroupPosition(
		int    $positionNumber,
		string $title,
		array  $items,
		bool   $showCollapsed = true,
	): self
	{
		return new self(
			kind          : PositionKind::Group,
			positionNumber: $positionNumber,
			title         : $title,
			items         : $items,
			showCollapsed : $showCollapsed
		);
	}

	/* getters and setters */

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
