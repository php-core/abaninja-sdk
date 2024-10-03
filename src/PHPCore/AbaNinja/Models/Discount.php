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
	public function __construct(
		protected ?float $percentage = null,
		protected ?float $amount = null
	) {}

	public function getCreateData(array $extraData = []): array
	{
		return isset($this->percentage)
			? [
				'percentage' => $this->percentage,
			]
			: [
				'amount' => $this->amount,
			];
	}

	/* getters and setters */

	public function getAmount(): ?float
	{
		return $this->amount;
	}

	public function setAmount(?float $amount): Discount
	{
		$this->amount = $amount;
		return $this;
	}

	public function getPercentage(): ?float
	{
		return $this->percentage;
	}

	public function setPercentage(?float $percentage): Discount
	{
		$this->percentage = $percentage;
		return $this;
	}
}
