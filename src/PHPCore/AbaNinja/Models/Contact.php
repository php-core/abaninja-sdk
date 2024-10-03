<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Models;

use PHPCore\AbaNinja\Classes\Model;
use PHPCore\AbaNinja\Enums\ContactType;

class Contact extends Model
{
	protected ContactType $type;
	protected string $value;
	protected bool $primary;

	public function isPrimary(): bool
	{
		return $this->primary;
	}

	public function setPrimary(bool $primary): Contact
	{
		$this->primary = $primary;
		return $this;
	}

	public function getType(): ContactType
	{
		return $this->type;
	}

	public function setType(ContactType $type): Contact
	{
		$this->type = $type;
		return $this;
	}

	public function getValue(): string
	{
		return $this->value;
	}

	public function setValue(string $value): Contact
	{
		$this->value = $value;
		return $this;
	}

	/* create data */

	public function getCreateData(array $extraData = []): array
	{
		return [
			'type'    => $this->type,
			'value'   => $this->value,
			'primary' => $this->primary,
		];
	}
}
