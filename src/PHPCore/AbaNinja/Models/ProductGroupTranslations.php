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
	public function __construct(
		protected ?ProductGroupTranslation $de = null,
		protected ?ProductGroupTranslation $en = null,
		protected ?ProductGroupTranslation $fr = null,
		protected ?ProductGroupTranslation $it = null,
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

	public function getDe(): ?ProductGroupTranslation
	{
		return $this->de;
	}

	public function setDe(?ProductGroupTranslation $de): ProductGroupTranslations
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ?ProductGroupTranslation
	{
		return $this->en;
	}

	public function setEn(?ProductGroupTranslation $en): ProductGroupTranslations
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ?ProductGroupTranslation
	{
		return $this->fr;
	}

	public function setFr(?ProductGroupTranslation $fr): ProductGroupTranslations
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ?ProductGroupTranslation
	{
		return $this->it;
	}

	public function setIt(?ProductGroupTranslation $it): ProductGroupTranslations
	{
		$this->it = $it;
		return $this;
	}
}
