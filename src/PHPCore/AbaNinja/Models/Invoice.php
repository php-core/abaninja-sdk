<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;
use PHPCore\AbaNinja\Enums\DunningLevel;

class Invoice extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'invoices';
	}

	protected string $invoiceNumber;

	protected DateTime $invoiceDate;
	protected ?DateTime $deliveryDate;

	protected ?DateTime $dueDate;

	protected bool $isImported;

	protected string $openAmount;

	protected DunningLevel $dunningLevel;

	public function getDeliveryDate(): ?DateTime
	{
		return $this->deliveryDate;
	}

	public function setDeliveryDate(?DateTime $deliveryDate): Invoice
	{
		$this->deliveryDate = $deliveryDate;
		return $this;
	}

	public function getDueDate(): ?DateTime
	{
		return $this->dueDate;
	}

	public function setDueDate(?DateTime $dueDate): Invoice
	{
		$this->dueDate = $dueDate;
		return $this;
	}

	public function getDunningLevel(): ?DunningLevel
	{
		return $this->dunningLevel;
	}

	public function setDunningLevel(?DunningLevel $dunningLevel): Invoice
	{
		$this->dunningLevel = $dunningLevel;
		return $this;
	}

	public function getInvoiceDate(): DateTime
	{
		return $this->invoiceDate;
	}

	public function setInvoiceDate(DateTime $invoiceDate): Invoice
	{
		$this->invoiceDate = $invoiceDate;
		return $this;
	}

	public function getInvoiceNumber(): string
	{
		return $this->invoiceNumber;
	}

	public function setInvoiceNumber(string $invoiceNumber): Invoice
	{
		$this->invoiceNumber = $invoiceNumber;
		return $this;
	}

	public function isImported(): bool
	{
		return $this->isImported;
	}

	public function setIsImported(bool $isImported): Invoice
	{
		$this->isImported = $isImported;
		return $this;
	}

	public function getOpenAmount(): string
	{
		return $this->openAmount;
	}

	public function setOpenAmount(string $openAmount): Invoice
	{
		$this->openAmount = $openAmount;
		return $this;
	}
}
