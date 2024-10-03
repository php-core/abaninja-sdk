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
use PHPCore\AbaNinja\Models\ProductGroupTranslations;
use PHPCore\AbaNinja\Models\ProductTranslations;
use PHPUnit\Framework\Attributes\Depends;
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

	public function testCreateProduct()
	{
		$testProductKey = '9399599593';

		$testNameGerman = 'test product german';
		$testDescriptionGerman = 'test product german description test';
		$testNameEnglish = 'test product english';
		$testDescriptionEnglish = 'test product english description test';

		$this->assertInstanceOf(
			Product::class,
			$createdProduct = (Product::create(
				$testProductKey,
				ProductTranslations::create(
					['productName' => $testNameGerman, 'productDescription' => $testDescriptionGerman],
					['productName' => $testNameEnglish, 'productDescription' => $testDescriptionEnglish],
				),
				1000,
				[],
				true,
				'6c9c2966-08c3-4a1b-a018-ffa3ae88df89',
			))->save()
		);
		$this->assertEquals(
			$testProductKey,
			$createdProduct->getProductKey()
		);

		$this->assertEquals(
			$testNameGerman,
			$createdProduct->getTranslations()->getDe()->productName
		);
		$this->assertEquals(
			$testNameEnglish,
			$createdProduct->getTranslations()->getEn()->productName
		);
		$this->assertEquals(
			$testDescriptionGerman,
			$createdProduct->getTranslations()->getDe()->productDescription
		);
		$this->assertEquals(
			$testDescriptionEnglish,
			$createdProduct->getTranslations()->getEn()->productDescription
		);

		return $createdProduct;
	}

	#[Depends('testCreateProduct')]
	public function testUpdateProduct(Product $createdProduct)
	{
		$testNameFrench = 'test product french';
		$testDescriptionFrench = 'test product french description';

		$createdProduct = $createdProduct
			->setTranslations(
				($createdProduct->getTranslations())
					->setTranslationValue(
						'fr',
						'productName',
						$testNameFrench
					)
					->setTranslationValue(
						'fr',
						'productDescription',
						$testDescriptionFrench
					)
			)
			->save();

		$this->assertEquals(
			$testNameFrench,
			$createdProduct->getTranslations()->getFr()->productName
		);
		$this->assertEquals(
			$testDescriptionFrench,
			$createdProduct->getTranslations()->getFr()->productDescription
		);

		return $createdProduct;
	}

	#[Depends('testUpdateProduct')]
	public function testDeleteProduct(Product $createdProduct)
	{
		$this->assertTrue(
			$createdProduct->remove()
		);
	}

	public function testCreateProductGroup()
	{
		$testGroupNumber = 9399599593;
		$testDescriptionGerman = 'test german';
		$testDescriptionEnglish = 'test english';

		$this->assertInstanceOf(
			ProductGroup::class,
			$createdProductGroup = (ProductGroup::create(
				$testGroupNumber,
				ProductGroupTranslations::create(
					$testDescriptionGerman,
					$testDescriptionEnglish
				),
			))->save()
		);
		$this->assertEquals(
			$testGroupNumber,
			$createdProductGroup->getGroupNumber()
		);

		$this->assertEquals(
			$testDescriptionGerman,
			$createdProductGroup->getTranslations()->getDe()->description
		);
		$this->assertEquals(
			$testDescriptionEnglish,
			$createdProductGroup->getTranslations()->getEn()->description
		);

		return $createdProductGroup;
	}

	#[Depends('testCreateProductGroup')]
	public function testUpdateProductGroup(ProductGroup $createdProductGroup)
	{
		$testDescriptionFrench = 'test french';

		$createdProductGroup = $createdProductGroup
			->setTranslations(
				($createdProductGroup->getTranslations())
					->setTranslationValue(
						'fr',
						'description',
						$testDescriptionFrench
					)
			)
			->save();

		$this->assertEquals(
			$testDescriptionFrench,
			$createdProductGroup->getTranslations()->getFr()->description
		);

		return $createdProductGroup;
	}

	#[Depends('testUpdateProductGroup')]
	public function testDeleteProductGroup(ProductGroup $createdProductGroup)
	{
		$this->assertTrue(
			$createdProductGroup->remove()
		);
	}
}
