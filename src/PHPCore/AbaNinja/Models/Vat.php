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
	public function __construct(
		protected ?float  $percentage = null,
		protected ?string $amount = null
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

	public function getAmount(): ?string
	{
		return $this->amount;
	}

	public function setAmount(?string $amount): Vat
	{
		$this->amount = $amount;
		return $this;
	}

	public function getPercentage(): ?float
	{
		return $this->percentage;
	}

	public function setPercentage(?float $percentage): Vat
	{
		$this->percentage = $percentage;
		return $this;
	}
}
