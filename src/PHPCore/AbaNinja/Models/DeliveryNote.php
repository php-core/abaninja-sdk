<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use DateTime;
use PHPCore\AbaNinja\Classes\DocumentsModel;

class DeliveryNote extends DocumentsModel
{

	public static function getResourceUri(): string
	{
		return 'delivery-notes';
	}

	protected string $deliveryNoteNumber;
	protected DateTime $deliveryNoteDate;

	public function getDeliveryNoteDate(): DateTime
	{
		return $this->deliveryNoteDate;
	}

	public function setDeliveryNoteDate(DateTime $deliveryNoteDate): DeliveryNote
	{
		$this->deliveryNoteDate = $deliveryNoteDate;
		return $this;
	}

	public function getDeliveryNoteNumber(): int
	{
		return $this->deliveryNoteNumber;
	}

	public function setDeliveryNoteNumber(int $deliveryNoteNumber): DeliveryNote
	{
		$this->deliveryNoteNumber = $deliveryNoteNumber;
		return $this;
	}
}
