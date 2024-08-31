<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;

class Template extends DocumentsModel
{

	public static function getResourceUri(): string
	{
		return 'templates';
	}

	protected PaymentInstructions $paymentInstrucations; // they have this weird typo here... :/

	/** @var CashDiscount[] $cashDiscounts */
	protected array $cashDiscounts;

	protected DateTime $dueDate;
	protected DateTime $invoiceDate;
	protected DateTime $deliverDate;

	protected bool $isVariantInvoice;

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
