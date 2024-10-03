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
use PHPCore\AbaNinja\Enums\SentStatus;

class Invoice extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'invoices';
	}

	public function __construct(
		protected bool         $isTemplate = false,
		protected ?string      $documentTotal = null,
		protected ?string      $reference = null,
		protected ?string      $currencyCode = null,

		protected ?string      $invoiceNumber = null,
		protected ?DateTime    $invoiceDate = null,
		protected ?DateTime    $deliveryDate = null,
		protected ?DateTime    $dueDate = null,
		protected bool         $isImported = false,
		protected string       $openAmount = '',
		protected DunningLevel $dunningLevel = DunningLevel::NoDunning,

		protected ?string      $title = null,
		protected ?string      $terms = null,
		protected ?string      $publicNotes = null,
		protected ?string      $footerText = null,
		protected ?Receiver    $receiver = null,
		/** @var Position[] $positions */
		protected array        $positions = [],
		protected ?string      $customField1 = null,
		protected ?string      $customField2 = null,
		protected ?string      $customField3 = null,
		protected ?string      $customField4 = null,
		protected ?DateTime    $updatedAt = null,
		protected bool         $isArchived = false,
		protected bool         $isCancelled = false,
		protected bool         $pricesIncludeVat = false,
		protected ?int         $id = null,
		protected ?string      $uuid = null,
		protected ?SentStatus  $sentStatus = null,
	) {
		parent::__construct();
	}

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

	public function getDunningLevel(): DunningLevel
	{
		return $this->dunningLevel;
	}

	public function setDunningLevel(DunningLevel $dunningLevel): Invoice
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
