<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       2.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductProductGroup extends Model
{
	protected int $productGroupId;
	protected string $productGroupUuid;
	protected int $productGroupNumber;
	protected string $productGroupDescription;
	protected int $productGroupBookingAccountNumber;
	protected int $productGroupBookingAccountId;

	public function getProductGroupBookingAccountId(): int
	{
		return $this->productGroupBookingAccountId;
	}

	public function setProductGroupBookingAccountId(int $productGroupBookingAccountId): ProductProductGroup
	{
		$this->productGroupBookingAccountId = $productGroupBookingAccountId;
		return $this;
	}

	public function getProductGroupBookingAccountNumber(): int
	{
		return $this->productGroupBookingAccountNumber;
	}

	public function setProductGroupBookingAccountNumber(int $productGroupBookingAccountNumber): ProductProductGroup
	{
		$this->productGroupBookingAccountNumber = $productGroupBookingAccountNumber;
		return $this;
	}

	public function getProductGroupDescription(): string
	{
		return $this->productGroupDescription;
	}

	public function setProductGroupDescription(string $productGroupDescription): ProductProductGroup
	{
		$this->productGroupDescription = $productGroupDescription;
		return $this;
	}

	public function getProductGroupId(): int
	{
		return $this->productGroupId;
	}

	public function setProductGroupId(int $productGroupId): ProductProductGroup
	{
		$this->productGroupId = $productGroupId;
		return $this;
	}

	public function getProductGroupNumber(): int
	{
		return $this->productGroupNumber;
	}

	public function setProductGroupNumber(int $productGroupNumber): ProductProductGroup
	{
		$this->productGroupNumber = $productGroupNumber;
		return $this;
	}

	public function getProductGroupUuid(): string
	{
		return $this->productGroupUuid;
	}

	public function setProductGroupUuid(string $productGroupUuid): ProductProductGroup
	{
		$this->productGroupUuid = $productGroupUuid;
		return $this;
	}
}
