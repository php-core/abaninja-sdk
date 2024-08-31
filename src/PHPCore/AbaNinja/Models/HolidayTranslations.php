<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class HolidayTranslations extends Model
{
	protected ?HolidayTranslation $de;
	protected ?HolidayTranslation $en;
	protected ?HolidayTranslation $fr;
	protected ?HolidayTranslation $it;

	public function getDe(): ?HolidayTranslation
	{
		return $this->de;
	}

	public function setDe(?HolidayTranslation $de): HolidayTranslations
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ?HolidayTranslation
	{
		return $this->en;
	}

	public function setEn(?HolidayTranslation $en): HolidayTranslations
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ?HolidayTranslation
	{
		return $this->fr;
	}

	public function setFr(?HolidayTranslation $fr): HolidayTranslations
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ?HolidayTranslation
	{
		return $this->it;
	}

	public function setIt(?HolidayTranslation $it): HolidayTranslations
	{
		$this->it = $it;
		return $this;
	}
}
