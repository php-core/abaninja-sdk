<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class Discount extends Model
{
	protected float $percentage;

	public function getPercentage(): float
	{
		return $this->percentage;
	}

	public function setPercentage(float $percentage): Discount
	{
		$this->percentage = $percentage;
		return $this;
	}
}
