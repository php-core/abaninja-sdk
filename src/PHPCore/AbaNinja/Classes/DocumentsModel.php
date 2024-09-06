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
	protected ?string $title = null;
	protected ?string $terms = null;
	protected ?string $publicNotes = null;
	protected ?string $footerText = null;
	protected string $documentTotal;
	protected string $reference;
	protected string $currencyCode;
	protected ?Receiver $receiver = null;

	/** @var Position[] $positions */
	protected array $positions = [];
	protected ?string $customField1 = null;
	protected ?string $customField2 = null;
	protected ?string $customField3 = null;
	protected ?string $customField4 = null;
	protected ?DateTime $updatedAt = null;
	protected bool $isArchived = false;
	protected bool $isCancelled = false;
	protected bool $pricesIncludeVat = false;
	protected SentStatus $sentStatus;

	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	public function setCurrencyCode(string $currencyCode): static
	{
		$this->currencyCode = $currencyCode;
		return $this;
	}

	public function getCustomField1(): ?string
	{
		return $this->customField1;
	}

	public function setCustomField1(?string $customField1): static
	{
		$this->customField1 = $customField1;
		return $this;
	}

	public function getCustomField2(): ?string
	{
		return $this->customField2;
	}

	public function setCustomField2(?string $customField2): static
	{
		$this->customField2 = $customField2;
		return $this;
	}

	public function getCustomField3(): ?string
	{
		return $this->customField3;
	}

	public function setCustomField3(?string $customField3): static
	{
		$this->customField3 = $customField3;
		return $this;
	}

	public function getCustomField4(): ?string
	{
		return $this->customField4;
	}

	public function setCustomField4(?string $customField4): static
	{
		$this->customField4 = $customField4;
		return $this;
	}

	public function getDocumentTotal(): string
	{
		return $this->documentTotal;
	}

	public function setDocumentTotal(string $documentTotal): static
	{
		$this->documentTotal = $documentTotal;
		return $this;
	}

	public function getFooterText(): ?string
	{
		return $this->footerText;
	}

	public function setFooterText(?string $footerText): static
	{
		$this->footerText = $footerText;
		return $this;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): static
	{
		$this->id = $id;
		return $this;
	}

	public function isArchived(): bool
	{
		return $this->isArchived;
	}

	public function setIsArchived(bool $isArchived): static
	{
		$this->isArchived = $isArchived;
		return $this;
	}

	public function isCancelled(): bool
	{
		return $this->isCancelled;
	}

	public function setIsCancelled(bool $isCancelled): static
	{
		$this->isCancelled = $isCancelled;
		return $this;
	}

	/**
	 * @return Position[]
	 */
	public function getPositions(): array
	{
		return $this->positions;
	}

	/**
	 * @param Position[] $positions
	 *
	 * @return $this
	 */
	public function setPositions(array $positions): static
	{
		$this->positions = $positions;
		return $this;
	}

	public function isPricesIncludeVat(): bool
	{
		return $this->pricesIncludeVat;
	}

	public function setPricesIncludeVat(bool $pricesIncludeVat): static
	{
		$this->pricesIncludeVat = $pricesIncludeVat;
		return $this;
	}

	public function getPublicNotes(): ?string
	{
		return $this->publicNotes;
	}

	public function setPublicNotes(?string $publicNotes): static
	{
		$this->publicNotes = $publicNotes;
		return $this;
	}

	public function getReceiver(): ?Receiver
	{
		return $this->receiver;
	}

	public function setReceiver(?Receiver $receiver): static
	{
		$this->receiver = $receiver;
		return $this;
	}

	public function getReference(): string
	{
		return $this->reference;
	}

	public function setReference(string $reference): static
	{
		$this->reference = $reference;
		return $this;
	}

	public function getSentStatus(): SentStatus
	{
		return $this->sentStatus;
	}

	public function setSentStatus(SentStatus $sentStatus): static
	{
		$this->sentStatus = $sentStatus;
		return $this;
	}

	public function getTerms(): ?string
	{
		return $this->terms;
	}

	public function setTerms(?string $terms): static
	{
		$this->terms = $terms;
		return $this;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(?string $title): static
	{
		$this->title = $title;
		return $this;
	}

	public function getUpdatedAt(): ?DateTime
	{
		return $this->updatedAt;
	}

	public function setUpdatedAt(?DateTime $updatedAt): static
	{
		$this->updatedAt = $updatedAt;
		return $this;
	}

	public function getUuid(): string
	{
		return $this->uuid;
	}

	public function setUuid(string $uuid): static
	{
		$this->uuid = $uuid;
		return $this;
	}
}
