<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class PaymentInstructions extends Model
{
	public function __construct(
		protected string $iban,
		protected string $bic,
		protected string $reference,
	) {}

	public function getCreateData(array $extraData = []): array
	{
		return [
			'iban'      => $this->iban,
			'bic'       => $this->bic,
			'reference' => $this->reference,
		];
	}

	/* getters and setters */

	public function getBic(): string
	{
		return $this->bic;
	}

	public function setBic(string $bic): PaymentInstructions
	{
		$this->bic = $bic;
		return $this;
	}

	public function getIban(): string
	{
		return $this->iban;
	}

	public function setIban(string $iban): PaymentInstructions
	{
		$this->iban = $iban;
		return $this;
	}

	public function getReference(): string
	{
		return $this->reference;
	}

	public function setReference(string $reference): PaymentInstructions
	{
		$this->reference = $reference;
		return $this;
	}
}
