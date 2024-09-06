<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductTranslation extends Model
{
	protected string $productName;
	protected string $productDescription;

	public function getProductDescription(): string
	{
		return $this->productDescription;
	}

	public function setProductDescription(string $productDescription): ProductTranslation
	{
		$this->productDescription = $productDescription;
		return $this;
	}

	public function getProductName(): string
	{
		return $this->productName;
	}

	public function setProductName(string $productName): ProductTranslation
	{
		$this->productName = $productName;
		return $this;
	}
}
