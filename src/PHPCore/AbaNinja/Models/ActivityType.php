<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ActivityType extends Model
{
	public static function getResourceUri(): string
	{
		return 'settings/activity-types';
	}

	protected string $uuid;
	protected string $activityTypeMasterUuid;
	protected string $activityNumber;
	protected string $unit;
	protected bool $isBillable;
	protected bool $isHoliday;
	protected int $activityGroup;
	protected bool $isTimecredit;
	protected bool $isShortTimeWork;
	protected bool $isFavorite;
	protected bool $used;
	protected string $description;
	protected ActivityTypeTranslations $translations;

	public function getActivityGroup(): int
	{
		return $this->activityGroup;
	}

	public function setActivityGroup(int $activityGroup): ActivityType
	{
		$this->activityGroup = $activityGroup;
		return $this;
	}

	public function getActivityNumber(): string
	{
		return $this->activityNumber;
	}

	public function setActivityNumber(string $activityNumber): ActivityType
	{
		$this->activityNumber = $activityNumber;
		return $this;
	}

	public function getActivityTypeMasterUuid(): string
	{
		return $this->activityTypeMasterUuid;
	}

	public function setActivityTypeMasterUuid(string $activityTypeMasterUuid): ActivityType
	{
		$this->activityTypeMasterUuid = $activityTypeMasterUuid;
		return $this;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDescription(string $description): ActivityType
	{
		$this->description = $description;
		return $this;
	}

	public function isBillable(): bool
	{
		return $this->isBillable;
	}

	public function setIsBillable(bool $isBillable): ActivityType
	{
		$this->isBillable = $isBillable;
		return $this;
	}

	public function isFavorite(): bool
	{
		return $this->isFavorite;
	}

	public function setIsFavorite(bool $isFavorite): ActivityType
	{
		$this->isFavorite = $isFavorite;
		return $this;
	}

	public function isHoliday(): bool
	{
		return $this->isHoliday;
	}

	public function setIsHoliday(bool $isHoliday): ActivityType
	{
		$this->isHoliday = $isHoliday;
		return $this;
	}

	public function isShortTimeWork(): bool
	{
		return $this->isShortTimeWork;
	}

	public function setIsShortTimeWork(bool $isShortTimeWork): ActivityType
	{
		$this->isShortTimeWork = $isShortTimeWork;
		return $this;
	}

	public function isTimecredit(): bool
	{
		return $this->isTimecredit;
	}

	public function setIsTimecredit(bool $isTimecredit): ActivityType
	{
		$this->isTimecredit = $isTimecredit;
		return $this;
	}

	public function getTranslations(): ActivityTypeTranslations
	{
		return $this->translations;
	}

	public function setTranslations(ActivityTypeTranslations $translations): ActivityType
	{
		$this->translations = $translations;
		return $this;
	}

	public function getUnit(): string
	{
		return $this->unit;
	}

	public function setUnit(string $unit): ActivityType
	{
		$this->unit = $unit;
		return $this;
	}

	public function isUsed(): bool
	{
		return $this->used;
	}

	public function setUsed(bool $used): ActivityType
	{
		$this->used = $used;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): ActivityType
	{
		$this->uuid = $uuid;
		return $this;
	}
}
