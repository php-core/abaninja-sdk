<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class BankAccount extends Model
{
	public static function getResourceUri(): string
	{
		return 'bank-accounts';
	}

	protected string $uuid;
	protected string $name;
	protected string $bankName;
	protected string $bankAddress;
	protected string $bankCity;
	protected string $iban;
	protected string $bic;
	protected string $currencyCode;
	protected QRBill $qrBill;
	protected bool $isActive;
	protected bool $isDefault;

	public function getBankAddress(): string
	{
		return $this->bankAddress;
	}

	public function setBankAddress(string $bankAddress): BankAccount
	{
		$this->bankAddress = $bankAddress;
		return $this;
	}

	public function getBankCity(): string
	{
		return $this->bankCity;
	}

	public function setBankCity(string $bankCity): BankAccount
	{
		$this->bankCity = $bankCity;
		return $this;
	}

	public function getBankName(): string
	{
		return $this->bankName;
	}

	public function setBankName(string $bankName): BankAccount
	{
		$this->bankName = $bankName;
		return $this;
	}

	public function getBic(): string
	{
		return $this->bic;
	}

	public function setBic(string $bic): BankAccount
	{
		$this->bic = $bic;
		return $this;
	}

	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	public function setCurrencyCode(string $currencyCode): BankAccount
	{
		$this->currencyCode = $currencyCode;
		return $this;
	}

	public function getIban(): string
	{
		return $this->iban;
	}

	public function setIban(string $iban): BankAccount
	{
		$this->iban = $iban;
		return $this;
	}

	public function isActive(): bool
	{
		return $this->isActive;
	}

	public function setIsActive(bool $isActive): BankAccount
	{
		$this->isActive = $isActive;
		return $this;
	}

	public function isDefault(): bool
	{
		return $this->isDefault;
	}

	public function setIsDefault(bool $isDefault): BankAccount
	{
		$this->isDefault = $isDefault;
		return $this;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): BankAccount
	{
		$this->name = $name;
		return $this;
	}

	public function getQrBill(): QRBill
	{
		return $this->qrBill;
	}

	public function setQrBill(QRBill $qrBill): BankAccount
	{
		$this->qrBill = $qrBill;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): BankAccount
	{
		$this->uuid = $uuid;
		return $this;
	}
}
