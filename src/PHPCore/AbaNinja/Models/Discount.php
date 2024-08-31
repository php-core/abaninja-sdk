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
	protected int $percentage;

	public function getPercentage(): int
	{
		return $this->percentage;
	}

	public function setPercentage(int $percentage): Discount
	{
		$this->percentage = $percentage;
		return $this;
	}
}
