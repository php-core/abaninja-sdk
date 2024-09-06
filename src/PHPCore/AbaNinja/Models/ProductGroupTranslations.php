<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductGroupTranslations extends Model
{
	protected ?ProductPropertyTranslation $de;
	protected ?ProductPropertyTranslation $en;
	protected ?ProductPropertyTranslation $fr;
	protected ?ProductPropertyTranslation $it;

	public function getDe(): ?ProductPropertyTranslation
	{
		return $this->de;
	}

	public function setDe(?ProductPropertyTranslation $de): ProductGroupTranslations
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ?ProductPropertyTranslation
	{
		return $this->en;
	}

	public function setEn(?ProductPropertyTranslation $en): ProductGroupTranslations
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ?ProductPropertyTranslation
	{
		return $this->fr;
	}

	public function setFr(?ProductPropertyTranslation $fr): ProductGroupTranslations
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ?ProductPropertyTranslation
	{
		return $this->it;
	}

	public function setIt(?ProductPropertyTranslation $it): ProductGroupTranslations
	{
		$this->it = $it;
		return $this;
	}
}
