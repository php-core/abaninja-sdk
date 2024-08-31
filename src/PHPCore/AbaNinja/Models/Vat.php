<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class Vat extends Model
{
	protected int $percentage;
	protected string $amount;

	public function getPercentage(): int
	{
		return $this->percentage;
	}

	public function setPercentage(int $percentage): Vat
	{
		$this->percentage = $percentage;
		return $this;
	}

	public function getAmount(): string
	{
		return $this->amount;
	}

	public function setAmount(string $amount): Vat
	{
		$this->amount = $amount;
		return $this;
	}
}
