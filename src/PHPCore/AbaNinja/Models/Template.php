<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;
use PHPCore\AbaNinja\Enums\SentStatus;

class Template extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'templates';
	}

	public function __construct(
		protected bool                 $isTemplate = false,
		protected ?string              $documentTotal = null,
		protected ?string              $reference = null,
		protected ?string              $currencyCode = null,

		protected ?PaymentInstructions $paymentInstrucations = null, // they have this weird typo here... :/
		/** @var CashDiscount[] $cashDiscounts */
		protected array                $cashDiscounts = [],
		protected ?DateTime            $dueDate = null,
		protected ?DateTime            $invoiceDate = null,
		protected ?DateTime            $deliverDate = null,
		protected bool                 $isVariantInvoice = false,

		protected ?string              $title = null,
		protected ?string              $terms = null,
		protected ?string              $publicNotes = null,
		protected ?string              $footerText = null,
		protected ?Receiver            $receiver = null,
		/** @var Position[] $positions */
		protected array                $positions = [],
		protected ?string              $customField1 = null,
		protected ?string              $customField2 = null,
		protected ?string              $customField3 = null,
		protected ?string              $customField4 = null,
		protected ?DateTime            $updatedAt = null,
		protected bool                 $isArchived = false,
		protected bool                 $isCancelled = false,
		protected bool                 $pricesIncludeVat = false,
		protected ?int                 $id = null,
		protected ?string              $uuid = null,
		protected ?SentStatus          $sentStatus = null,
	)
	{
		parent::__construct();
	}

	public function getCashDiscounts(): array
	{
		return $this->cashDiscounts;
	}

	public function setCashDiscounts(array $cashDiscounts): Template
	{
		$this->cashDiscounts = $cashDiscounts;
		return $this;
	}

	public function getDeliverDate(): DateTime
	{
		return $this->deliverDate;
	}

	public function setDeliverDate(DateTime $deliverDate): Template
	{
		$this->deliverDate = $deliverDate;
		return $this;
	}

	public function getDueDate(): DateTime
	{
		return $this->dueDate;
	}

	public function setDueDate(DateTime $dueDate): Template
	{
		$this->dueDate = $dueDate;
		return $this;
	}

	public function getInvoiceDate(): DateTime
	{
		return $this->invoiceDate;
	}

	public function setInvoiceDate(DateTime $invoiceDate): Template
	{
		$this->invoiceDate = $invoiceDate;
		return $this;
	}

	public function isVariantInvoice(): bool
	{
		return $this->isVariantInvoice;
	}

	public function setIsVariantInvoice(bool $isVariantInvoice): Template
	{
		$this->isVariantInvoice = $isVariantInvoice;
		return $this;
	}

	public function getPaymentInstrucations(): PaymentInstructions
	{
		return $this->paymentInstrucations;
	}

	public function setPaymentInstrucations(PaymentInstructions $paymentInstrucations): Template
	{
		$this->paymentInstrucations = $paymentInstrucations;
		return $this;
	}
}
