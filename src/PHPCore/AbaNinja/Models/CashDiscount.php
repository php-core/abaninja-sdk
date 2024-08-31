<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class CashDiscount extends Model
{
	protected int $days;
	protected string $percentage;

	public function getDays(): int
	{
		return $this->days;
	}

	public function setDays(int $days): CashDiscount
	{
		$this->days = $days;
		return $this;
	}

	public function getPercentage(): string
	{
		return $this->percentage;
	}

	public function setPercentage(string $percentage): CashDiscount
	{
		$this->percentage = $percentage;
		return $this;
	}
}
