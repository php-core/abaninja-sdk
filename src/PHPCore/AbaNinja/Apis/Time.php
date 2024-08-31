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
use PHPCore\AbaNinja\Models\ActivityType;

class Time extends Api
{
	public function __construct(
		string $apiKey,
		string $accountUuid,
		string $baseUrl = 'https://api.abaninja.ch',
		string $apiVersion = 'v2'
	)
	{
		parent::__construct($apiKey, $accountUuid, 'time', $baseUrl, $apiVersion);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getActivityType(string $uuid): ActivityType|IModel
	{
		return $this->__getOne(ActivityType::class, $uuid);
	}

	/**
	 * @return ActivityType[]
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function listActivityTypes(): array
	{
		return $this->__list(ActivityType::class);
	}
}
