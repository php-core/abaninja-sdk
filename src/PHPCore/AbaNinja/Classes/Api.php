<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Classes;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use PHPCore\AbaNinja\AbaNinjaConfig;
use PHPCore\AbaNinja\Enums\HttpMethod;
use PHPCore\AbaNinja\Exceptions\ApiErrorException;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\ApiRequestException;
use PHPCore\AbaNinja\Exceptions\ApiResponseException;
use PHPCore\AbaNinja\Exceptions\AuthenticationException;
use PHPCore\AbaNinja\Exceptions\NotFoundException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;
use PHPCore\AbaNinja\Exceptions\ScopeException;
use PHPCore\AbaNinja\Interfaces\IModel;

class Api
{
	private Client $client;

	public static function getDataKey(): ?string
	{
		return 'data';
	}

	/**
	 * @throws RuntimeException
	 */
	public function __construct(
		private readonly string  $apiKey,
		private readonly string  $accountUuid,
		private readonly ?string $subPath = null,
		private readonly string  $baseUrl = 'https://api.abaninja.ch',
		private readonly string  $apiVersion = 'v2',
	)
	{
		if (empty($this->subPath)) {
			throw new RuntimeException('This class should not be initialized directly');
		}
		$this->client = new Client([
			'base_uri' => $this->baseUrl . '/accounts/' . $this->accountUuid . '/' . $this->subPath . '/' . $this->apiVersion . '/',
			'headers'  => [
				'Authorization' => 'Bearer ' . $this->apiKey,
				'Content-Type'  => 'application/json',
			],
		]);
	}

	/**
	 * @throws RuntimeException
	 */
	public static function init(AbaNinjaConfig $config): static
	{
		return new static(
			$config->getApiKey(),
			$config->getAccountUuid(),
			$config->getBaseUrl()
		);
	}

	public function getClient(): Client
	{
		return $this->client;
	}

	/* request functions */

	/**
	 * @throws ApiException
	 */
	private function request(
		HttpMethod $httpMethod,
		string     $uri,
		array      $data = [],
		array      $options = []
	): ApiResponse
	{
		if (in_array($httpMethod, [
				HttpMethod::GET,
				HttpMethod::DELETE,
			]) && !empty($data)) {
			$options['query'] = $data;
		}

		if (in_array($httpMethod, [
			HttpMethod::POST,
			HttpMethod::DELETE,
			HttpMethod::PUT,
			HttpMethod::PATCH,
		])) {
			$options['json'] = $data;
		}

		try {
			$response = $this->client->request(
				$httpMethod->value,
				$uri,
				$options,
			);
		} catch (GuzzleException|ClientException $e) {
			switch ($e->getCode()) {
				case 400:
				{
					// is part of APIs logic, handle!
					$response = $e->getResponse();
					break;
				}
				case 401:
					throw new AuthenticationException('Authentication failed. API-Token or API-Key invalid or expired', 401, $e);
				case 403:
					throw new ScopeException(
						'The provided API token does not fulfill the required scope requirements.'
						. (empty($response = $e->getResponse())
							? ''
							: PHP_EOL . ApiResponseException::fromResponse(ApiResponse::fromResponse($response))->getMessage()
						),
						403,
						$e
					);
				case 404:
					throw new NotFoundException('The requested resource could not be found by the API.', 404, $e);
				case 500:
					throw new ApiErrorException('The API returned an unknown error.', 500, $e);
				default:
					throw new ApiRequestException(
						'The '
						. $httpMethod->name . ' API request to "'
						. $uri . '" failed',
						$e->getCode(),
						$e
					);
			}
		}

		return ApiResponse::fromResponse($response);
	}

	/**
	 * @throws ApiException
	 */
	public function get(string $uri, array $queryData = [], array $options = []): ApiResponse
	{
		return $this->request(HttpMethod::GET, $uri, $queryData, $options);
	}

	/**
	 * @throws ApiException
	 */
	public function delete(string $uri, array $data = [], array $options = []): ApiResponse
	{
		return $this->request(HttpMethod::DELETE, $uri, $data, $options);
	}

	/**
	 * @throws ApiException
	 */
	public function post(string $uri, array $bodyData = [], array $options = []): ApiResponse
	{
		return $this->request(HttpMethod::POST, $uri, $bodyData, $options);
	}

	/**
	 * @throws ApiException
	 */
	public function put(string $uri, array $bodyData = [], array $options = []): ApiResponse
	{
		return $this->request(HttpMethod::PUT, $uri, $bodyData, $options);
	}

	/**
	 * @throws ApiException
	 */
	public function patch(string $uri, array $bodyData = [], array $options = []): ApiResponse
	{
		return $this->request(HttpMethod::PATCH, $uri, $bodyData, $options);
	}

	/* generic API request functions */

	/**
	 * @throws ApiException|RuntimeException
	 */
	public function __getOne(string|IModel $model, string $uuid): IModel
	{
		$response = $this->get($model::getResourceUri() . '/' . $uuid);
		return $response->getHttpCode() === 200
			? $model::from((empty($dataKey = self::getDataKey()) ? $response->getResponse() : $response->getResponse()->{$dataKey}))
			: throw ApiResponseException::fromResponse($response);
	}

	/**
	 * @param string|IModel $model
	 * @param int $page
	 * @param int|null $limit
	 * @param array $data
	 * @param array $options
	 *
	 * @return IModel[]
	 * @throws ApiException|RuntimeException
	 */
	public function __paginate(string|IModel $model, int $page = 1, ?int $limit = null, array $data = [], array $options = []): array
	{
		$data['page'] = $page;
		if (!empty($limit)) {
			$data['limit'] = $limit;
		}
		$response = $this->get(
			$model::getResourceUri(),
			$data,
			$options
		);
		return $response->getHttpCode() === 200
			? $model::fromMany((empty($dataKey = self::getDataKey()) ? $response->getResponse() : $response->getResponse()->{$dataKey}))
			: throw ApiResponseException::fromResponse($response);
	}

	/**
	 * @param string|IModel $model
	 * @param array $data
	 * @param array $options
	 *
	 * @return IModel[]
	 * @throws ApiException|RuntimeException
	 */
	public function __list(string|IModel $model, array $data = [], array $options = []): array
	{
		$response = $this->get(
			$model::getResourceUri(),
			$data,
			$options
		);
		return $response->getHttpCode() === 200
			? $model::fromMany((empty($dataKey = self::getDataKey()) ? $response->getResponse() : $response->getResponse()->{$dataKey}))
			: throw ApiResponseException::fromResponse($response);
	}

	/**
	 * @throws ApiResponseException
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function __create(
		IModel $model,
		string $createUri = null,
		array  $extraData = [],
		array  $options = []
	): IModel
	{
		$response = $this->post(
			(empty($createUri) ? $model::getResourceUri() : $createUri),
			$model->getCreateData($extraData),
			$options
		);
		return $response->getHttpCode() === 201
			? $model::from(
				(empty($dataKey = self::getDataKey())
					? $response->getResponse()
					: $response->getResponse()->{$dataKey})
			)
			: throw ApiResponseException::fromResponse($response);
	}

	/**
	 * @throws ApiResponseException
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function __update(
		IModel $model,
		string $updateUri = null,
		array  $extraData = [],
		array  $options = []
	)
	{
		$response = $this->patch(
			(empty($updateUri) ? $model::getResourceUri() : $updateUri)
			. '/' . $model->getUuid(),
			$model->getUpdateData($extraData),
			$options
		);
		return $response->getHttpCode() === 200
			? $model::from(
				(empty($dataKey = self::getDataKey())
					? $response->getResponse()
					: $response->getResponse()->{$dataKey})
			)
			: throw ApiResponseException::fromResponse($response);
	}
}
