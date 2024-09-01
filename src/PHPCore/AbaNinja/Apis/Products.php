<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Apis;

use PHPCore\AbaNinja\Classes\Api;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;
use PHPCore\AbaNinja\Interfaces\IModel;
use PHPCore\AbaNinja\Models\Product;
use PHPCore\AbaNinja\Models\ProductGroup;

class Products extends Api
{
	public function __construct(
		string $apiKey,
		string $accountUuid,
		string $baseUrl = 'https://api.abaninja.ch',
		string $apiVersion = 'v2'
	)
	{
		parent::__construct($apiKey, $accountUuid, 'products', $baseUrl, $apiVersion);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getProduct(string $uuid): Product|IModel
	{
		return $this->__getOne(Product::class, $uuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param bool $isArchived
	 *
	 * @return Product[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listProducts(
		int  $page = 1,
		?int $limit = null,
		bool $isArchived = false
	): array
	{
		return $this->__paginate(Product::class, $page, $limit, [
			'isArchived' => $isArchived,
		]);
	}


	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getProductGroup(string $uuid): ProductGroup|IModel
	{
		return $this->__getOne(ProductGroup::class, $uuid);
	}

	/**
	 * @param bool $onlyArchived
	 *
	 * @return ProductGroup[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listProductGroups(bool $onlyArchived = false): array
	{
		return $this->__list(ProductGroup::class, [
			'onlyArchived' => $onlyArchived,
		]);
	}
}
