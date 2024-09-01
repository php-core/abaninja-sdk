<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Tests\PHPCore\AbaNinja\Tests;

use PHPCore\AbaNinja\AbaNinja;
use PHPCore\AbaNinja\Models\Product;
use PHPCore\AbaNinja\Models\ProductGroup;
use PHPUnit\Framework\TestCase;

final class ProductsTest extends TestCase
{
	public function testGetProduct()
	{
		if (empty($_ENV['TEST_PRODUCT_UUID'])) {
			self::markTestSkipped('To test getProduct function, set "TEST_PRODUCT_UUID" environment variable to a valid products UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_PRODUCT_UUID'],
			AbaNinja::ProductsApi()->getProduct($_ENV['TEST_PRODUCT_UUID'])->getProductUuid()
		);
	}

	public function testListProducts()
	{
		$this->assertIsArray(
			$products = AbaNinja::ProductsApi()->listProducts(1, 2)
		);
		if (!empty($products)) {
			$this->assertInstanceOf(
				Product::class,
				$products[0]
			);
		}
	}

	public function testListArchivedProducts()
	{
		$this->assertIsArray(
			$archivedProducts = AbaNinja::ProductsApi()->listProducts(1, 2, true)
		);
		if (!empty($archivedProducts)) {
			$this->assertNotNull(
				$archivedProducts[0]->getArchivedAt()
			);
		}
	}

	public function testGetProductGroup()
	{
		if (empty($_ENV['TEST_PRODUCT_GROUP_UUID'])) {
			self::markTestSkipped('To test getProduct function, set "TEST_PRODUCT_GROUP_UUID" environment variable to a valid product groups UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_PRODUCT_GROUP_UUID'],
			AbaNinja::ProductsApi()->getProductGroup($_ENV['TEST_PRODUCT_GROUP_UUID'])->getUuid()
		);
	}

	public function testListProductGroups()
	{
		$this->assertIsArray(
			$productGroups = AbaNinja::ProductsApi()->listProductGroups()
		);
		if (!empty($productGroups)) {
			$this->assertInstanceOf(
				ProductGroup::class,
				$productGroups[0]
			);
		}
	}

	public function testListArchivedProductGroups()
	{
		$this->assertIsArray(
			$archivedProductGroups = AbaNinja::ProductsApi()->listProductGroups(true)
		);
		if (!empty($archivedProductGroups)) {
			$this->assertNotNull(
				$archivedProductGroups[0]->isArchived()
			);
		}
	}
}
