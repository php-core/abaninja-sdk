<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Apis;

use PHPCore\AbaNinja\Classes\Api;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;
use PHPCore\AbaNinja\Interfaces\IModel;
use PHPCore\AbaNinja\Models\BankAccount;

class Finances extends Api
{
	public function __construct(
		string $apiKey,
		string $accountUuid,
		string $baseUrl = 'https://api.abaninja.ch',
		string $apiVersion = 'v2'
	)
	{
		parent::__construct($apiKey, $accountUuid, 'finances', $baseUrl, $apiVersion);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getBankAccount(string $uuid): BankAccount|IModel
	{
		return $this->__getOne(BankAccount::class, $uuid);
	}

	/**
	 * @return BankAccount[]
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function listBankAccounts(): array
	{
		return $this->__paginate(BankAccount::class);
	}
}
