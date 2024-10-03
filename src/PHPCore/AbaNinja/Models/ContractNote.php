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

class ContractNote extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'contract-notes';
	}

	public function __construct(
		protected bool        $isTemplate = false,
		protected ?string     $documentTotal = null,
		protected ?string     $reference = null,
		protected ?string     $currencyCode = null,

		protected ?int        $contractNoteNumber = null,
		protected ?DateTime   $contractNoteDate = null,
		protected ?DateTime   $dueDate = null,

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
