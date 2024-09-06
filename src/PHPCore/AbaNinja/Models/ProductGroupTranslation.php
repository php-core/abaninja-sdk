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
	protected string $description;

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
