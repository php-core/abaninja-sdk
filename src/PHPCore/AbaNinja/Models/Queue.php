<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class Queue extends Model
{
	public static function getResourceUri(): string
	{
		return 'queue';
	}

	public function __construct(
		protected string $uuid,
		protected int    $total,
		protected bool   $successful,
		protected bool   $failed,
	) {}

	/** @var QueueDetails[] $details */
	protected array $details;

	public function getDetails(): array
	{
		return $this->details;
	}

	public function setDetails(array $details): Queue
	{
		$this->details = $details;
		return $this;
	}

	public function isFailed(): bool
	{
		return $this->failed;
	}

	public function setFailed(bool $failed): Queue
	{
		$this->failed = $failed;
		return $this;
	}

	public function isSuccessful(): bool
	{
		return $this->successful;
	}

	public function setSuccessful(bool $successful): Queue
	{
		$this->successful = $successful;
		return $this;
	}

	public function getTotal(): int
	{
		return $this->total;
	}

	public function setTotal(int $total): Queue
	{
		$this->total = $total;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): Queue
	{
		$this->uuid = $uuid;
		return $this;
	}
}
