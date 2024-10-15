<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Apis;

use PHPCore\AbaNinja\Classes\Api;
use PHPCore\AbaNinja\Classes\ApiActionResponse;
use PHPCore\AbaNinja\Enums\ProductAction;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\ApiResponseException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;
use PHPCore\AbaNinja\Interfaces\IApiModel;
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
	public function getProduct(string $uuid): Product|IApiModel
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
    public function getActionsForProduct(string $uuid): array
    {
        return ProductAction::fromMany($this->__getActions(Product::class, $uuid));
    }

    /**
     * @throws RuntimeException
     * @throws ApiException
     */
    public function executeActionOnProduct(string $uuid, ProductAction $action): ApiActionResponse
    {
        return $this->__executeAction(Product::class, $uuid, $action->value);
    }

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getProductGroup(string $uuid): ProductGroup|IApiModel
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

	/**
	 * @throws ApiResponseException
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function create(Product|ProductGroup|IApiModel $model): Product|ProductGroup|IApiModel
	{
		return $this->__create(
			$model,
			$model::getResourceUri(),
		);
	}

	/**
	 * @throws ApiResponseException
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function update(Product|ProductGroup|IApiModel $model): Product|ProductGroup|IApiModel
	{
		return $this->__update(
			$model,
			$model::getResourceUri(),
		);
	}
}
