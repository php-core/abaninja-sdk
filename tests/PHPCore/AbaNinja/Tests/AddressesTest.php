<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Tests;

use PHPCore\AbaNinja\AbaNinja;
use PHPCore\AbaNinja\Models\Address;
use PHPUnit\Framework\TestCase;

final class AddressesTest extends TestCase
{
	public function testGetCompany()
	{
		if (empty($_ENV['TEST_COMPANY_UUID'])) {
			self::markTestSkipped('To test getCompany function, set "TEST_COMPANY_UUID" environment variable to a valid companies UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_COMPANY_UUID'],
			AbaNinja::AddressesApi()->getCompany($_ENV['TEST_COMPANY_UUID'])->getUuid()
		);
	}

	public function testListCompanyAddresses()
	{
		$this->assertIsArray(
			AbaNinja::AddressesApi()->listCompanyAddresses(1, 2)
		);
	}

	public function testGetPerson()
	{
		if (empty($_ENV['TEST_PERSON_UUID'])) {
			self::markTestSkipped('To test getPerson function, set "TEST_PERSON_UUID" environment variable to a valid persons UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_PERSON_UUID'],
			AbaNinja::AddressesApi()->getPerson($_ENV['TEST_PERSON_UUID'])->getUuid()
		);
		self::assertInstanceOf(
			Address::class,
			AbaNinja::AddressesApi()->getPerson($_ENV['TEST_PERSON_UUID'])->getAddresses()[0]
		);
	}

	public function testListPersonAddresses()
	{
		$this->assertIsArray(
			AbaNinja::AddressesApi()->listPersonAddresses(1, 2)
		);
	}

	public function testCheckIfCustomerNumberIsAvailableTrue()
	{
		$this->assertTrue(
			AbaNinja::AddressesApi()->checkIfCustomerNumberIsAvailable('test-cant-exist'),
		);
	}

	public function testCheckIfCustomerNumberExistsFalse()
	{
		$this->assertFalse(
			AbaNinja::AddressesApi()->checkIfCustomerNumberExists('test-cant-exist'),
		);
	}

	public function testCheckIfCustomerNumberIsAvailableFalse()
	{
		if (empty($_ENV['TEST_EXISTING_CUSTOMER_NUMBER'])) {
			self::markTestSkipped('To test the checkIfCustomerNumberIsAvailable function property, set the "TEST_EXISTING_CUSTOMER_NUMBER" environment variable to an existing customer number');
		}
		$this->assertFalse(
			AbaNinja::AddressesApi()->checkIfCustomerNumberIsAvailable($_ENV['TEST_EXISTING_CUSTOMER_NUMBER']),
		);
	}

	public function testCheckIfCustomerNumberExistsTrue()
	{
		if (empty($_ENV['TEST_EXISTING_CUSTOMER_NUMBER'])) {
			self::markTestSkipped('To test the checkIfCustomerNumberIsAvailable function property, set the "TEST_EXISTING_CUSTOMER_NUMBER" environment variable to an existing customer number');
		}
		$this->assertTrue(
			AbaNinja::AddressesApi()->checkIfCustomerNumberExists($_ENV['TEST_EXISTING_CUSTOMER_NUMBER']),
		);
	}
}
