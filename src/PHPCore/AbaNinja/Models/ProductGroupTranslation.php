<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductGroupTranslation extends Model
{
	public function __construct(protected string $description = '') {}

	public function getCreateData(array $extraData = []): array
	{
		return [
			'description' => $this->description,
		];
	}

	/* getters and setters */

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDescription(string $description): ProductGroupTranslation
	{
		$this->description = $description;
		return $this;
	}
}
