<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja;

use PHPCore\AbaNinja\Apis\Addresses;
use PHPCore\AbaNinja\Apis\Documents;
use PHPCore\AbaNinja\Apis\Finances;
use PHPCore\AbaNinja\Apis\Holidays;
use PHPCore\AbaNinja\Apis\Products;
use PHPCore\AbaNinja\Apis\Time;
use PHPCore\AbaNinja\Apis\Units;
use PHPCore\AbaNinja\Exceptions\ConfigurationException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;

class AbaNinja
{

	private static AbaNinjaConfig $config;

	public static function setConfig(AbaNinjaConfig $config): void
	{
		self::$config = $config;
	}

	/**
	 * @throws RuntimeException
	 */
	public static function AddressesApi(): Addresses
	{
		return Addresses::init(self::getConfig());
	}

	/**
	 * @throws ConfigurationException
	 */
	private static function getConfig(): AbaNinjaConfig
	{
		return self::$config ?? self::$config = AbaNinjaConfig::default();
	}

	/**
	 * @throws RuntimeException
	 */
	public static function DocumentsApi(): Documents
	{
		return Documents::init(self::getConfig());
	}

	/**
	 * @throws RuntimeException
	 */
	public static function FinancesApi(): Finances
	{
		return Finances::init(self::getConfig());
	}

	/**
	 * @throws RuntimeException
	 */
	public static function HolidaysApi(): Holidays
	{
		return Holidays::init(self::getConfig());
	}

	/**
	 * @throws RuntimeException
	 */
	public static function ProductsApi(): Products
	{
		return Products::init(self::getConfig());
	}

	/**
	 * @throws RuntimeException
	 */
	public static function TimeApi(): Time
	{
		return Time::init(self::getConfig());
	}

	/**
	 * @throws RuntimeException
	 */
	public static function UnitsApi(): Units
	{
		return Units::init(self::getConfig());
	}
}
