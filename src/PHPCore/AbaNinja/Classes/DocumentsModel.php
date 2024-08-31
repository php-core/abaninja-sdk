<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Classes;

use DateTime;
use PHPCore\AbaNinja\Enums\SentStatus;
use PHPCore\AbaNinja\Models\Position;
use PHPCore\AbaNinja\Models\Receiver;

class DocumentsModel extends Model
{
	public static function getSubKey(): ?string
	{
		return 'documents';
	}

	protected int $id;
	protected string $uuid;
	protected string $title;
	protected ?string $terms;
	protected ?string $publicNotes;
	protected ?string $footerText;
	protected string $documentTotal;
	protected string $reference;
	protected string $currencyCode;
	protected ?Receiver $receiver;

	/** @var Position[] $positions */
	protected array $positions;
	protected ?string $customField1;
	protected ?string $customField2;
	protected ?string $customField3;
	protected ?string $customField4;
	protected ?DateTime $updatedAt;
	protected bool $isArchived;
	protected bool $isCancelled;
	protected bool $pricesIncludeVat;
	protected SentStatus $sentStatus;

	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	public function setCurrencyCode(string $currencyCode): DocumentsModel
	{
		$this->currencyCode = $currencyCode;
		return $this;
	}

	public function getCustomField1(): ?string
	{
		return $this->customField1;
	}

	public function setCustomField1(?string $customField1): DocumentsModel
	{
		$this->customField1 = $customField1;
		return $this;
	}

	public function getCustomField2(): ?string
	{
		return $this->customField2;
	}

	public function setCustomField2(?string $customField2): DocumentsModel
	{
		$this->customField2 = $customField2;
		return $this;
	}

	public function getCustomField3(): ?string
	{
		return $this->customField3;
	}

	public function setCustomField3(?string $customField3): DocumentsModel
	{
		$this->customField3 = $customField3;
		return $this;
	}

	public function getCustomField4(): ?string
	{
		return $this->customField4;
	}

	public function setCustomField4(?string $customField4): DocumentsModel
	{
		$this->customField4 = $customField4;
		return $this;
	}

	public function getDocumentTotal(): string
	{
		return $this->documentTotal;
	}

	public function setDocumentTotal(string $documentTotal): DocumentsModel
	{
		$this->documentTotal = $documentTotal;
		return $this;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): DocumentsModel
	{
		$this->id = $id;
		return $this;
	}

	public function isArchived(): bool
	{
		return $this->isArchived;
	}

	public function setIsArchived(bool $isArchived): DocumentsModel
	{
		$this->isArchived = $isArchived;
		return $this;
	}

	public function isCancelled(): bool
	{
		return $this->isCancelled;
	}

	public function setIsCancelled(bool $isCancelled): DocumentsModel
	{
		$this->isCancelled = $isCancelled;
		return $this;
	}

	public function getPositions(): array
	{
		return $this->positions;
	}

	public function setPositions(array $positions): DocumentsModel
	{
		$this->positions = $positions;
		return $this;
	}

	public function isPricesIncludeVat(): bool
	{
		return $this->pricesIncludeVat;
	}

	public function setPricesIncludeVat(bool $pricesIncludeVat): DocumentsModel
	{
		$this->pricesIncludeVat = $pricesIncludeVat;
		return $this;
	}

	public function getFooterText(): ?string
	{
		return $this->footerText;
	}

	public function setFooterText(?string $footerText): DocumentsModel
	{
		$this->footerText = $footerText;
		return $this;
	}

	public function getPublicNotes(): ?string
	{
		return $this->publicNotes;
	}

	public function setPublicNotes(?string $publicNotes): DocumentsModel
	{
		$this->publicNotes = $publicNotes;
		return $this;
	}

	public function getTerms(): ?string
	{
		return $this->terms;
	}

	public function setTerms(?string $terms): DocumentsModel
	{
		$this->terms = $terms;
		return $this;
	}

	public function getReceiver(): ?Receiver
	{
		return $this->receiver;
	}

	public function setReceiver(?Receiver $receiver): DocumentsModel
	{
		$this->receiver = $receiver;
		return $this;
	}

	public function getReference(): string
	{
		return $this->reference;
	}

	public function setReference(string $reference): DocumentsModel
	{
		$this->reference = $reference;
		return $this;
	}

	public function getSentStatus(): ?SentStatus
	{
		return $this->sentStatus;
	}

	public function setSentStatus(?SentStatus $sentStatus): DocumentsModel
	{
		$this->sentStatus = $sentStatus;
		return $this;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function setTitle(string $title): DocumentsModel
	{
		$this->title = $title;
		return $this;
	}

	public function getUpdatedAt(): ?DateTime
	{
		return $this->updatedAt;
	}

	public function setUpdatedAt(?DateTime $updatedAt): DocumentsModel
	{
		$this->updatedAt = $updatedAt;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): DocumentsModel
	{
		$this->uuid = $uuid;
		return $this;
	}
}
