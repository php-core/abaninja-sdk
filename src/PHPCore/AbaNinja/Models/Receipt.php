<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;

class Receipt extends DocumentsModel
{

	public static function getResourceUri(): string
	{
		return 'receipts';
	}

	protected string $number;
	protected DateTime $invoiceDate;
	protected DateTime $dueDate;
	protected DateTime $deliverDate;
	protected bool $archived;
	protected bool $cancelled;
	protected int $balance;

	/** @var CashDiscount[] $cashDiscounts */
	protected array $cashDiscounts;

	protected ?DocumentDiscount $documentDiscount;

	public function isArchived(): bool
	{
		return $this->archived;
	}

	public function setArchived(bool $archived): Receipt
	{
		$this->archived = $archived;
		return $this;
	}

	public function getBalance(): int
	{
		return $this->balance;
	}

	public function setBalance(int $balance): Receipt
	{
		$this->balance = $balance;
		return $this;
	}

	public function isCancelled(): bool
	{
		return $this->cancelled;
	}

	public function setCancelled(bool $cancelled): Receipt
	{
		$this->cancelled = $cancelled;
		return $this;
	}

	public function getCashDiscounts(): array
	{
		return $this->cashDiscounts;
	}

	public function setCashDiscounts(array $cashDiscounts): Receipt
	{
		$this->cashDiscounts = $cashDiscounts;
		return $this;
	}

	public function getDeliverDate(): DateTime
	{
		return $this->deliverDate;
	}

	public function setDeliverDate(DateTime $deliverDate): Receipt
	{
		$this->deliverDate = $deliverDate;
		return $this;
	}

	public function getDocumentDiscount(): ?DocumentDiscount
	{
		return $this->documentDiscount;
	}

	public function setDocumentDiscount(?DocumentDiscount $documentDiscount): Receipt
	{
		$this->documentDiscount = $documentDiscount;
		return $this;
	}

	public function getDueDate(): DateTime
	{
		return $this->dueDate;
	}

	public function setDueDate(DateTime $dueDate): Receipt
	{
		$this->dueDate = $dueDate;
		return $this;
	}

	public function getInvoiceDate(): DateTime
	{
		return $this->invoiceDate;
	}

	public function setInvoiceDate(DateTime $invoiceDate): Receipt
	{
		$this->invoiceDate = $invoiceDate;
		return $this;
	}

	public function getNumber(): string
	{
		return $this->number;
	}

	public function setNumber(string $number): Receipt
	{
		$this->number = $number;
		return $this;
	}
}
