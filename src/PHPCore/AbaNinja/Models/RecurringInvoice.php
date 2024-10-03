<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;
use PHPCore\AbaNinja\Enums\Frequency;
use PHPCore\AbaNinja\Enums\SentStatus;

class RecurringInvoice extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'recurring-invoices';
	}

	public function __construct(
		protected bool        $isTemplate = false,
		protected ?string     $documentTotal = null,
		protected ?string     $reference = null,
		protected ?string     $currencyCode = null,

		protected ?Frequency  $frequency = null,
		protected ?bool       $isLastOfMonth = null,
		protected ?bool       $isRecurringActive = null,
		protected ?DateTime   $startDate = null,

		protected ?string     $title = null,
		protected ?string     $terms = null,
		protected ?string     $publicNotes = null,
		protected ?string     $footerText = null,
		protected ?Receiver   $receiver = null,
		/** @var Position[] $positions */
		protected array       $positions = [],
		protected ?string     $customField1 = null,
		protected ?string     $customField2 = null,
		protected ?string     $customField3 = null,
		protected ?string     $customField4 = null,
		protected ?DateTime   $updatedAt = null,
		protected bool        $isArchived = false,
		protected bool        $isCancelled = false,
		protected bool        $pricesIncludeVat = false,
		protected ?int        $id = null,
		protected ?string     $uuid = null,
		protected ?SentStatus $sentStatus = null,
	)
	{
		parent::__construct();
	}

	public function getFrequency(): Frequency
	{
		return $this->frequency;
	}

	public function setFrequency(Frequency $frequency): RecurringInvoice
	{
		$this->frequency = $frequency;
		return $this;
	}

	public function isLastOfMonth(): bool
	{
		return $this->isLastOfMonth;
	}

	public function setIsLastOfMonth(bool $isLastOfMonth): RecurringInvoice
	{
		$this->isLastOfMonth = $isLastOfMonth;
		return $this;
	}

	public function isRecurringActive(): bool
	{
		return $this->isRecurringActive;
	}

	public function setIsRecurringActive(bool $isRecurringActive): RecurringInvoice
	{
		$this->isRecurringActive = $isRecurringActive;
		return $this;
	}

	public function getStartDate(): DateTime
	{
		return $this->startDate;
	}

	public function setStartDate(DateTime $startDate): RecurringInvoice
	{
		$this->startDate = $startDate;
		return $this;
	}
}
