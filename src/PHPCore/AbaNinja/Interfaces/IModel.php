<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Interfaces;

use PHPCore\AbaNinja\Exceptions\RuntimeException;

interface IModel
{
	/**
	 * @return string
	 * @throws RuntimeException
	 */
	public static function getResourceUri(): string;

	public function __construct(array $fromData = []);

	public static function from(array $fromData, bool $fromMany = false): static;

	public static function tryFrom(array $fromData, bool $fromMany = false): ?static;

	/**
	 * @param array $fromListData
	 *
	 * @return static[]
	 */
	public static function fromMany(mixed $fromListData): array;
}
