<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Apis;

use PHPCore\AbaNinja\Classes\Api;
use PHPCore\AbaNinja\Enums\SwissState;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;
use PHPCore\AbaNinja\Interfaces\IModel;
use PHPCore\AbaNinja\Models\Holiday;

class Holidays extends Api
{

	public static function getDataKey(): ?string
	{
		return null;
	}

	public function __construct(
		string $apiKey,
		string $accountUuid,
		string $baseUrl = 'https://api.abaninja.ch',
		string $apiVersion = 'v2'
	)
	{
		parent::__construct($apiKey, $accountUuid, 'holidays', $baseUrl, $apiVersion);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getHoliday(string $uuid): Holiday|IModel
	{
		return $this->__getOne(Holiday::class, $uuid);
	}

	/**
	 * @return Holiday[]
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function listHolidaysForState(
		string      $countryCode,
		?SwissState $state = null,
		?int        $type = null,
		?int        $year = null,
		?\DateTime  $date = null
	): array
	{
		return $this->__list(Holiday::class, [
			'countryCode' => $countryCode,
			'status'      => $state?->value,
			'type'        => $type,
			'year'        => $year,
			'date'        => $date?->format('Y-m-d'),
		]);
	}
}
