<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Tests\PHPCore\AbaNinja\Tests;

use PHPCore\AbaNinja\AbaNinja;
use PHPCore\AbaNinja\Enums\SwissState;
use PHPUnit\Framework\TestCase;

final class HolidaysTest extends TestCase
{
	public function testGetHoliday()
	{
		if (empty($_ENV['TEST_HOLIDAY_UUID'])) {
			self::markTestSkipped('To test getHoliday function, set "TEST_HOLIDAY_UUID" environment variable to a valid holidays UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_HOLIDAY_UUID'],
			AbaNinja::HolidaysApi()->getHoliday($_ENV['TEST_HOLIDAY_UUID'])->getUuid()
		);
	}

	public function testListHolidaysForState()
	{
		$this->assertIsArray(
			$holidays = AbaNinja::HolidaysApi()->listHolidaysForState(
				'CH',
				SwissState::AG
			)
		);
		$this->assertIsObject($holidays[0]->getTranslations()->getDe());
	}
}
