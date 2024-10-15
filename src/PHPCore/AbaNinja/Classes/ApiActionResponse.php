<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       15.10.2024
 */

namespace PHPCore\AbaNinja\Classes;

use stdClass;

class ApiActionResponse
{
    public function __construct(
        protected int $status,
        protected string $message,
        protected null|array|stdClass $data = null
    ) {}

    public static function fromResponse(ApiResponse $response): self
    {
        return new self(
            $response->getResponse()->status,
            $response->getResponse()->message,
            property_exists($response->getResponse(), 'data')
                ? $response->getResponse()->data
                : null
        );
    }

    /* getters */

    public function getData(): ?array
    {
        return (array)$this->data;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
