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

class RecurringInvoice extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'recurring-invoices';
	}

	protected Frequency $frequency;
	protected bool $isLastOfMonth;
	protected bool $isRecurringActive;
	protected DateTime $startDate;

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
