<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class UnitTranslations extends Model
{
	public function __construct(
		protected ?UnitTranslation $de = null,
		protected ?UnitTranslation $en = null,
		protected ?UnitTranslation $fr = null,
		protected ?UnitTranslation $it = null
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

	public function getDe(): ?UnitTranslation
	{
		return $this->de;
	}

	public function setDe(?UnitTranslation $de): UnitTranslations
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ?UnitTranslation
	{
		return $this->en;
	}

	public function setEn(?UnitTranslation $en): UnitTranslations
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ?UnitTranslation
	{
		return $this->fr;
	}

	public function setFr(?UnitTranslation $fr): UnitTranslations
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ?UnitTranslation
	{
		return $this->it;
	}

	public function setIt(?UnitTranslation $it): UnitTranslations
	{
		$this->it = $it;
		return $this;
	}
}
