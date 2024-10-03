<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductPropertyTranslations extends Model
{
	public function __construct(
		protected ?ProductPropertyTranslation $de = null,
		protected ?ProductPropertyTranslation $en = null,
		protected ?ProductPropertyTranslation $fr = null,
		protected ?ProductPropertyTranslation $it = null,
	) {}

	public function getCreateData(array $extraData = []): array
	{
		return [
			'de' => $this->de?->getCreateData() ?? ['description' => ''],
			'en' => $this->en?->getCreateData() ?? ['description' => ''],
			'fr' => $this->fr?->getCreateData() ?? ['description' => ''],
			'it' => $this->it?->getCreateData() ?? ['description' => ''],
		];
	}

	/* getters and setters */

	public function getDe(): ?ProductPropertyTranslation
	{
		return $this->de;
	}

	public function setDe(?ProductPropertyTranslation $de): ProductPropertyTranslations
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ?ProductPropertyTranslation
	{
		return $this->en;
	}

	public function setEn(?ProductPropertyTranslation $en): ProductPropertyTranslations
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ?ProductPropertyTranslation
	{
		return $this->fr;
	}

	public function setFr(?ProductPropertyTranslation $fr): ProductPropertyTranslations
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ?ProductPropertyTranslation
	{
		return $this->it;
	}

	public function setIt(?ProductPropertyTranslation $it): ProductPropertyTranslations
	{
		$this->it = $it;
		return $this;
	}
}
