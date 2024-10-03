<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;

class QRBill extends Model
{
	public function __construct(
		protected string $qrIban,
		protected string $besrId,
		protected bool   $active
	) {}

	public function isActive(): bool
	{
		return $this->active;
	}

	public function setActive(bool $active): QRBill
	{
		$this->active = $active;
		return $this;
	}

	public function getBesrId(): string
	{
		return $this->besrId;
	}

	public function setBesrId(string $besrId): QRBill
	{
		$this->besrId = $besrId;
		return $this;
	}

	public function getQrIban(): string
	{
		return $this->qrIban;
	}

	public function setQrIban(string $qrIban): QRBill
	{
		$this->qrIban = $qrIban;
		return $this;
	}
}
