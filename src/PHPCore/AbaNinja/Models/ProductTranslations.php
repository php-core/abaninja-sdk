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
	public function __construct(
		protected ?ProductTranslation $de = null,
		protected ?ProductTranslation $en = null,
		protected ?ProductTranslation $fr = null,
		protected ?ProductTranslation $it = null,
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

	public function getDe(): ?ProductTranslation
	{
		return $this->de;
	}

	public function setDe(?ProductTranslation $de): ProductTranslations
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ?ProductTranslation
	{
		return $this->en;
	}

	public function setEn(?ProductTranslation $en): ProductTranslations
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ?ProductTranslation
	{
		return $this->fr;
	}

	public function setFr(?ProductTranslation $fr): ProductTranslations
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ?ProductTranslation
	{
		return $this->it;
	}

	public function setIt(?ProductTranslation $it): ProductTranslations
	{
		$this->it = $it;
		return $this;
	}
}
