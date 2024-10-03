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

class DeliveryNote extends DocumentsModel
{
	public static function getResourceUri(): string
	{
		return 'delivery-notes';
	}

	public function __construct(
		protected bool        $isTemplate = false,
		protected ?string     $documentTotal = null,
		protected ?string     $reference = null,
		protected ?string     $currencyCode = null,

		protected ?string     $deliveryNoteNumber = null,
		protected ?DateTime   $deliveryNoteDate = null,

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

	public function getDeliveryNoteDate(): DateTime
	{
		return $this->deliveryNoteDate;
	}

	public function setDeliveryNoteDate(DateTime $deliveryNoteDate): DeliveryNote
	{
		$this->deliveryNoteDate = $deliveryNoteDate;
		return $this;
	}

	public function getDeliveryNoteNumber(): ?string
	{
		return $this->deliveryNoteNumber;
	}

	public function setDeliveryNoteNumber(?string $deliveryNoteNumber): DeliveryNote
	{
		$this->deliveryNoteNumber = $deliveryNoteNumber;
		return $this;
	}
}
