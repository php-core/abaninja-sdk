<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ActivityTypeTranslations extends Model
{
	public function __construct(
		protected ?ActivityTypeTranslation $de = null,
		protected ?ActivityTypeTranslation $en = null,
		protected ?ActivityTypeTranslation $fr = null,
		protected ?ActivityTypeTranslation $it = null
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

	public function getDe(): ?ActivityTypeTranslation
	{
		return $this->de;
	}

	public function setDe(?ActivityTypeTranslation $de): ActivityTypeTranslations
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ?ActivityTypeTranslation
	{
		return $this->en;
	}

	public function setEn(?ActivityTypeTranslation $en): ActivityTypeTranslations
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ?ActivityTypeTranslation
	{
		return $this->fr;
	}

	public function setFr(?ActivityTypeTranslation $fr): ActivityTypeTranslations
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ?ActivityTypeTranslation
	{
		return $this->it;
	}

	public function setIt(?ActivityTypeTranslation $it): ActivityTypeTranslations
	{
		$this->it = $it;
		return $this;
	}
}
