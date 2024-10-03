<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Exceptions;

use PHPCore\AbaNinja\Classes\ApiResponse;
use Throwable;

class ApiResponseException extends ApiException
{
	public static function fromResponse(ApiResponse $response, ?Throwable $previous = null): self
	{
		$responseData = $response->getResponse();
		if (empty($responseData->error)) {
			return new self(
				'ERROR! Response: ' . var_export($response->getResponse(), true),
				$response->getHttpCode(),
				$previous
			);
		}
		return new self(
			$responseData->error . ': '
			. $responseData->error_description,
			$response->getHttpCode(),
			$previous
		);
	}
}
