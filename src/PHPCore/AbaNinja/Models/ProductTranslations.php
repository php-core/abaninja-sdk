<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductTranslations extends Model
{
	protected ProductTranslation $de;
	protected ProductTranslation $en;
	protected ProductTranslation $fr;
	protected ProductTranslation $it;

	public function getDe(): ProductTranslation
	{
		return $this->de;
	}

	public function setDe(ProductTranslation $de): ProductTranslations
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ProductTranslation
	{
		return $this->en;
	}

	public function setEn(ProductTranslation $en): ProductTranslations
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ProductTranslation
	{
		return $this->fr;
	}

	public function setFr(ProductTranslation $fr): ProductTranslations
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ProductTranslation
	{
		return $this->it;
	}

	public function setIt(ProductTranslation $it): ProductTranslations
	{
		$this->it = $it;
		return $this;
	}
}
