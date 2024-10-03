<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Interfaces;

use PHPCore\AbaNinja\Exceptions\RuntimeException;
use stdClass;

interface IModel
{
	public static function getUuidKey(): ?string;

	/**
	 * @return string
	 * @throws RuntimeException
	 */
	public static function getResourceUri(): string;

	public static function createFromData(array|stdClass $fromData = []): static;

	public static function from(array $fromData, bool $fromMany = false): static;

	public static function tryFrom(array $fromData, bool $fromMany = false): ?static;

	/**
	 * @param array $fromListData
	 *
	 * @return static[]
	 */
	public static function fromMany(mixed $fromListData): array;

	public static function get(string $uuid): static;

	public static function list(array $filters = []): array;

	public function save(): static;

	public function getUuid(): ?string;

	public function getCreateData(array $extraData = []): array;

	public function getUpdateData(array $extraData = []): array;
}
