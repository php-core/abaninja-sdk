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
        $contents = $response->getBody()->getContents();
        if (!empty($_ENV['RESPONSE_LOGGING']) && $_ENV['RESPONSE_LOGGING'] === 'true') {
            print PHP_EOL . 'CONTENTS:' . PHP_EOL;
            Helper::dump($contents);
        }
        try {
            if (
                empty($contents)
                || empty($decoded = json_decode($contents, false, 512, JSON_THROW_ON_ERROR))
                || (json_encode($decoded) !== $contents)
            ) {
                if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 204) {
                    // resource was deleted successfully
                    $decoded = new stdClass();
                } else {
                    throw new ApiResponseException('Received invalid response from API');
                }
            }
        } catch (\JsonException $e) {
            throw new ApiResponseException('Received invalid JSON response from API. Error from JSON parser: ' . $e->getMessage());
        }
        if (!empty($_ENV['RESPONSE_LOGGING']) && $_ENV['RESPONSE_LOGGING'] === 'true') {
            print PHP_EOL . 'PARSED:' . PHP_EOL;
            Helper::dump($decoded);
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
