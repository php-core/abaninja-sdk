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
}
