<?php declare(strict_types=1);

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;

class Quote extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'quotes';
	}

	protected string $quoteNumber;

	protected DateTime $quoteDate;

	protected DateTime $validUntilDate;

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
