<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductGroup extends Model
{
	public static function getResourceUri(): string
	{
		return 'product-groups';
	}

	protected string $uuid;
	protected int $groupNumber;
	protected int $bookingAccountNumber;
	protected bool $isArchived;
	protected bool $isDeletable;
	protected ProductGroupTranslations $translations;

	public function getBookingAccountNumber(): int
	{
		return $this->bookingAccountNumber;
	}

	public function setBookingAccountNumber(int $bookingAccountNumber): ProductGroup
	{
		$this->bookingAccountNumber = $bookingAccountNumber;
		return $this;
	}

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
}
