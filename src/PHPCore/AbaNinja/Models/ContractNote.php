<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;

class ContractNote extends DocumentsModel
{

	public static function getResourceUri(): string
	{
		return 'contract-notes';
	}

	protected int $contractNoteNumber;
	protected DateTime $contractNoteDate;

	protected DateTime $dueDate;

	public function getContractNoteDate(): DateTime
	{
		return $this->contractNoteDate;
	}

	public function setContractNoteDate(DateTime $contractNoteDate): ContractNote
	{
		$this->contractNoteDate = $contractNoteDate;
		return $this;
	}

	public function getContractNoteNumber(): int
	{
		return $this->contractNoteNumber;
	}

	public function setContractNoteNumber(int $contractNoteNumber): ContractNote
	{
		$this->contractNoteNumber = $contractNoteNumber;
		return $this;
	}

	public function getDueDate(): DateTime
	{
		return $this->dueDate;
	}

	public function setDueDate(DateTime $dueDate): ContractNote
	{
		$this->dueDate = $dueDate;
		return $this;
	}
}
