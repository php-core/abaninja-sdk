<?php declare(strict_types=1);

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;
use PHPCore\AbaNinja\Enums\SentStatus;

class Quote extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'quotes';
	}

	public function __construct(
		protected bool        $isTemplate = false,
		protected ?string     $documentTotal = null,
		protected ?string     $reference = null,
		protected ?string     $currencyCode = null,

		protected ?string     $quoteNumber = null,
		protected ?DateTime   $quoteDate = null,
		protected ?DateTime   $validUntilDate = null,

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
	) {
		parent::__construct();
	}

	public function getQuoteDate(): DateTime
	{
		return $this->quoteDate;
	}

	public function setQuoteDate(DateTime $quoteDate): Quote
	{
		$this->quoteDate = $quoteDate;
		return $this;
	}

	public function getQuoteNumber(): string
	{
		return $this->quoteNumber;
	}

	public function setQuoteNumber(string $quoteNumber): Quote
	{
		$this->quoteNumber = $quoteNumber;
		return $this;
	}

	public function getValidUntilDate(): DateTime
	{
		return $this->validUntilDate;
	}

	public function setValidUntilDate(DateTime $validUntilDate): Quote
	{
		$this->validUntilDate = $validUntilDate;
		return $this;
	}
}
