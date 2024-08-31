<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Enums;

enum SentStatus: string
{
	case Sent = 'SENT';
	case Open = 'OPEN';
	case Error = 'ERROR';
}
