<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Classes;

use GuzzleHttp\Psr7\Response;
use PHPCore\AbaNinja\Exceptions\ApiResponseException;
use stdClass;

class ApiResponse
{
	public function __construct(
		private readonly int      $httpCode,
		private readonly stdClass $response
	) {}

	/**
	 * @throws ApiResponseException
	 */
	public static function fromResponse(Response $response): self
	{
		if (
			empty($contents = $response->getBody()->getContents())
			|| empty($decoded = json_decode($contents))
			|| (json_encode($decoded) !== $contents)
		) {
			throw new ApiResponseException('Received invalid JSON response from API');
		}
		return self::from($response->getStatusCode(), $decoded);
	}

	public static function from(int $httpCode, stdClass $response): self
	{
		return new self($httpCode, $response);
	}

	/* getters and setters */

	public function getHttpCode(): int
	{
		return $this->httpCode;
	}

	public function getResponse(): stdClass
	{
		return $this->response;
	}
}
