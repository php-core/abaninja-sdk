<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Tests\PHPCore\AbaNinja\Tests;

use PHPCore\AbaNinja\AbaNinja;
use PHPUnit\Framework\TestCase;

final class TimeTest extends TestCase
{
	public function testGetActivityType()
	{
		if (empty($_ENV['TEST_ACTIVITY_TYPE_UUID'])) {
			self::markTestSkipped('To test getActivityType function, set "TEST_ACTIVITY_TYPE_UUID" environment variable to a valid activity types UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_ACTIVITY_TYPE_UUID'],
			AbaNinja::TimeApi()->getActivityType($_ENV['TEST_ACTIVITY_TYPE_UUID'])->getUuid()
		);
	}

	public function testListActivityTypes()
	{
		$this->assertIsArray(
			$holidays = AbaNinja::TimeApi()->listActivityTypes()
		);
		$this->assertIsObject($holidays[0]->getTranslations()->getDe());
	}
}
