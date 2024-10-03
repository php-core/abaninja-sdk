<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       3.10.2024
 */

namespace PHPCore\AbaNinja\Classes;

use PHPCore\AbaNinja\Exceptions\AbaNinjaException;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;
use PHPCore\AbaNinja\Interfaces\IApiModel;

class ApiModel extends Model implements IApiModel
{
	public static function getUuidKey(): ?string
	{
		return 'uuid';
	}

	/**
	 * @throws RuntimeException
	 */
	public static function getResourceUri(): string
	{
		throw new RuntimeException(__FUNCTION__ . ' was not implemented in ' . static::class);
	}

	/**
	 * @throws RuntimeException
	 */
	public static function getApi(): Api
	{
		throw new RuntimeException(__FUNCTION__ . ' was not implemented in ' . static::class);
	}

	public static function get(string $uuid): static
	{
		throw new \RuntimeException(__FUNCTION__ . ' is not implemented in ' . static::class);
	}

	public static function list(array $filters = []): array
	{
		throw new \RuntimeException(__FUNCTION__ . ' is not implemented in ' . static::class);
	}

	/**
	 * @throws AbaNinjaException
	 */
	public function save(): static
	{
		return empty($this->getUuid())
			? static::getApi()->create($this)
			: static::getApi()->update($this);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function remove(): bool
	{
		return static::getApi()->remove($this);
	}

	public function getUuid(): ?string
	{
		return property_exists($this, $uuidKey = static::getUuidKey()) && !empty($uuid = $this->{$uuidKey})
			? $uuid
			: null;
	}

	/**
	 * @throws RuntimeException
	 */
	public function getCreateData(array $extraData = []): array
	{
		throw new RuntimeException(__FUNCTION__ . ' was not implemented for ' . static::class);
	}

	/**
	 * @throws RuntimeException
	 */
	public function getUpdateData(array $extraData = []): array
	{
		return static::getCreateData($extraData);
	}
}
