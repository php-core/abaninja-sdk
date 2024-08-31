<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;

class CreditNote extends DocumentsModel
{

	public static function getResourceUri(): string
	{
		return 'credit-notes';
	}

	protected DateTime $creditNoteDate;

	protected DateTime $dueDate;

	public function getCreditNoteDate(): DateTime
	{
		return $this->creditNoteDate;
	}

	public function setCreditNoteDate(DateTime $creditNoteDate): CreditNote
	{
		$this->creditNoteDate = $creditNoteDate;
		return $this;
	}

	public function getDueDate(): DateTime
	{
		return $this->dueDate;
	}

	public function setDueDate(DateTime $dueDate): CreditNote
	{
		$this->dueDate = $dueDate;
		return $this;
	}
}
