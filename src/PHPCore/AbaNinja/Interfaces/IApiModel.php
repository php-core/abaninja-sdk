<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       3.10.2024
 */

namespace PHPCore\AbaNinja\Interfaces;

use PHPCore\AbaNinja\Exceptions\RuntimeException;

interface IApiModel extends IModel
{
	public static function getUuidKey(): ?string;

	public function getUuid(): ?string;

	/**
	 * @return string
	 * @throws RuntimeException
	 */
	public static function getResourceUri(): string;

	public static function get(string $uuid): static;

	public static function list(array $filters = []): array;

	public function save(): static;
	public function remove(): bool;
}
