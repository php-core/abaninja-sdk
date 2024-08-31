<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja;

use PHPCore\AbaNinja\Exceptions\ConfigurationException;

class AbaNinjaConfig
{
	public function __construct(
		private string  $apiKey,
		private string  $accountUuid,
		private ?string $baseUrl = null
	) {}

	/**
	 * @throws ConfigurationException
	 */
	public static function default(): self
	{
		return self::init(
			(
				$_ENV['ABANINJA_API_KEY']
				?? throw new ConfigurationException('Environment variable "ABANINJA_API_KEY" not set and no configuration was set in the code')
			),
			(
				$_ENV['ABANINJA_ACCOUNT_UUID']
				?? throw new ConfigurationException('Environment variable "ABANINJA_ACCOUNT_UUID" not set and no configuration was set in the code')
			),
			($_ENV['ABANINJA_API_BASE_URL'] ?? null)
		);
	}

	public static function init(
		string  $apiKey,
		string  $accountUuid,
		?string $baseUrl = null
	): self
	{
		return new self($apiKey, $accountUuid, $baseUrl);
	}

	/* getters and setters */

	public function getAccountUuid(): string
	{
		return $this->accountUuid;
	}

	public function setAccountUuid(string $accountUuid): AbaNinjaConfig
	{
		$this->accountUuid = $accountUuid;
		return $this;
	}

	public function getApiKey(): string
	{
		return $this->apiKey;
	}

	public function setApiKey(string $apiKey): AbaNinjaConfig
	{
		$this->apiKey = $apiKey;
		return $this;
	}

	public function getBaseUrl(): ?string
	{
		return $this->baseUrl;
	}

	public function setBaseUrl(?string $baseUrl): AbaNinjaConfig
	{
		$this->baseUrl = $baseUrl;
		return $this;
	}
}
