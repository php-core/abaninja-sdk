<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductProperty extends Model
{
	protected int $id;
	protected string $type;
	protected string $value;
	protected string $isocode;
	protected ProductPropertyTranslations $translations;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): ProductProperty
	{
		$this->id = $id;
		return $this;
	}

	public function getIsocode(): string
	{
		return $this->isocode;
	}

	public function setIsocode(string $isocode): ProductProperty
	{
		$this->isocode = $isocode;
		return $this;
	}

	public function getTranslations(): ProductPropertyTranslations
	{
		return $this->translations;
	}

	public function setTranslations(ProductPropertyTranslations $translations): ProductProperty
	{
		$this->translations = $translations;
		return $this;
	}

	public function getType(): string
	{
		return $this->type;
	}

	public function setType(string $type): ProductProperty
	{
		$this->type = $type;
		return $this;
	}

	public function getValue(): string
	{
		return $this->value;
	}

	public function setValue(string $value): ProductProperty
	{
		$this->value = $value;
		return $this;
	}
}
