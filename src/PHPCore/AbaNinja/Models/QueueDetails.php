<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;
use PHPCore\AbaNinja\Enums\QueueStatus;

class QueueDetails extends Model
{
	public function __construct(
		protected QueueStatus $status,
		protected string      $message,
		protected Invoice     $invoice,
	) {}

	public function getInvoice(): Invoice
	{
		return $this->invoice;
	}

	public function setInvoice(Invoice $invoice): QueueDetails
	{
		$this->invoice = $invoice;
		return $this;
	}

	public function getMessage(): string
	{
		return $this->message;
	}

	public function setMessage(string $message): QueueDetails
	{
		$this->message = $message;
		return $this;
	}

	public function getStatus(): QueueStatus
	{
		return $this->status;
	}

	public function setStatus(QueueStatus $status): QueueDetails
	{
		$this->status = $status;
		return $this;
	}
}
