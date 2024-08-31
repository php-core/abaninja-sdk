<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Tests\PHPCore\AbaNinja\Tests;

use PHPCore\AbaNinja\AbaNinja;
use PHPCore\AbaNinja\Exceptions\ScopeException;
use PHPUnit\Framework\TestCase;

final class FinancesTest extends TestCase
{
	public function testGetBankAccount()
	{
		if (empty($_ENV['TEST_BANK_ACCOUNT_UUID'])) {
			self::markTestSkipped('To test getBankAccount function, set "TEST_BANK_ACCOUNT_UUID" environment variable to a valid bank accounts UUID on the account');
		}
		try {
			self::assertEquals(
				$_ENV['TEST_BANK_ACCOUNT_UUID'],
				AbaNinja::FinancesApi()->getBankAccount($_ENV['TEST_BANK_ACCOUNT_UUID'])->getUuid()
			);
		} catch (ScopeException $exception) {
			self::markTestSkipped(
				$exception->getMessage()
				. PHP_EOL . 'To test getBankAccount function, the API_KEY must be allowed to access finances'
			);
		}
	}

	public function testListBankAccounts()
	{
		try {
			$this->assertIsArray(
				AbaNinja::FinancesApi()->listBankAccounts()
			);
		} catch (ScopeException $exception) {
			self::markTestSkipped(
				$exception->getMessage()
				. PHP_EOL . 'To test listBankAccounts function, the API_KEY must be allowed to access finances'
			);
		}
	}
}
