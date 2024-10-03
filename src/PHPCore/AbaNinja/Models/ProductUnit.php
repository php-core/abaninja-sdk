<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       1.9.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class ProductUnit extends Model
{
	public function __construct(
		protected int    $id,
		protected string $uuid,
		protected string $isocode,
	) {}

	public function getCreateData(array $extraData = []): array
	{
		return [
			'id'      => $this->id,
			'uuid'    => $this->uuid,
			'isocode' => $this->isocode,
		];
	}

	/* getters and setters */

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): ProductUnit
	{
		$this->id = $id;
		return $this;
	}

	public function getIsocode(): string
	{
		return $this->isocode;
	}

	public function setIsocode(string $isocode): ProductUnit
	{
		$this->isocode = $isocode;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): ProductUnit
	{
		$this->uuid = $uuid;
		return $this;
	}
}
