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
use PHPCore\AbaNinja\Models\Company;
use PHPCore\AbaNinja\Models\Person;

class Addresses extends Api
{
	public function __construct(
		string $apiKey,
		string $accountUuid,
		string $baseUrl = 'https://api.abaninja.ch',
		string $apiVersion = 'v2'
	)
	{
		parent::__construct($apiKey, $accountUuid, 'addresses', $baseUrl, $apiVersion);
	}

	/**
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getCompany(string $uuid): Company|IModel
	{
		return $this->__getOne(Company::class, $uuid);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function listCompanyAddresses(int $page = 1, ?int $limit = null, array $tags = []): array
	{
		return $this->__list(
			Company::class,
			$page,
			$limit,
			[
				'tags' => $tags,
			]
		);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getPerson(string $uuid): Person|IModel
	{
		return $this->__getOne(Person::class, $uuid);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function listPersonAddresses(int $page = 1, ?int $limit = null, array $tags = []): array
	{
		return $this->__list(
			Person::class,
			$page,
			$limit,
			[
				'tags' => $tags,
			]
		);
	}

	/**
	 * @throws ApiException
	 */
	public function checkIfCustomerNumberExists(
		string  $customerNumber,
		?string $ignoreAddressUuid = null
	): bool
	{
		$response = $this->get('check-customer-number', [
			'customerNumber' => $customerNumber,
			'addressUuid'    => $ignoreAddressUuid,
		]);

		return $response->getHttpCode() === 400;
	}

	/**
	 * @throws ApiException
	 */
	public function checkIfCustomerNumberIsAvailable(
		string  $customerNumber,
		?string $ignoreAddressUuid = null
	): bool
	{
		$response = $this->get('check-customer-number', [
			'customerNumber' => $customerNumber,
			'addressUuid'    => $ignoreAddressUuid,
		]);

		return $response->getHttpCode() === 200;
	}
}
