<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class DocumentDiscount extends Model
{
	protected int $amount;
	protected int $percentage;

	public function getAmount(): int
	{
		return $this->amount;
	}

	public function setAmount(int $amount): DocumentDiscount
	{
		$this->amount = $amount;
		return $this;
	}

	public function getPercentage(): int
	{
		return $this->percentage;
	}

	public function setPercentage(int $percentage): DocumentDiscount
	{
		$this->percentage = $percentage;
		return $this;
	}
}
