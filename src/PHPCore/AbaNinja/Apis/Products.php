<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Apis;

use PHPCore\AbaNinja\Classes\Api;

class Products extends Api
{
	public function __construct(
		string $apiKey,
		string $accountUuid,
		string $baseUrl = 'https://api.abaninja.ch',
		string $apiVersion = 'v2'
	)
	{
		parent::__construct($apiKey, $accountUuid, 'products', $baseUrl, $apiVersion);
	}
}
