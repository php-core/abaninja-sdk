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
	public function __construct(
		protected ?float $amount = null,
		protected ?float $percentage = null,
	) {}

	public function getCreateData(array $extraData = []): array
	{
		return [
			'amount'     => $this->amount,
			'percentage' => $this->percentage,
		];
	}

	/* getters and setters */

	public function getAmount(): ?float
	{
		return $this->amount;
	}

	public function setAmount(?float $amount): DocumentDiscount
	{
		$this->amount = $amount;
		return $this;
	}

	public function getPercentage(): ?float
	{
		return $this->percentage;
	}

	public function setPercentage(?float $percentage): DocumentDiscount
	{
		$this->percentage = $percentage;
		return $this;
	}
}
