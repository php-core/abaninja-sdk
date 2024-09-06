<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Tests\PHPCore\AbaNinja\Tests;

use PHPCore\AbaNinja\AbaNinja;
use PHPCore\AbaNinja\Models\Unit;
use PHPUnit\Framework\TestCase;

final class UnitsTest extends TestCase
{
	public function testGetUnit()
	{
		if (empty($_ENV['TEST_UNIT_UUID'])) {
			self::markTestSkipped('To test getUnit function, set "TEST_UNIT_UUID" environment variable to a valid units UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_UNIT_UUID'],
			AbaNinja::UnitsApi()->getUnit($_ENV['TEST_UNIT_UUID'])->getUuid()
		);
	}

	public function testListUnits()
	{
		$this->assertIsArray(
			$units = AbaNinja::UnitsApi()->listUnits()
		);
		if (!empty($units)) {
			$this->assertInstanceOf(
				Unit::class,
				$units[0]
			);
		}
	}
}
