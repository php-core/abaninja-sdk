<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

const PHPCORE_ABANINJA_DEBUG = 1;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

if (empty($_ENV['ABANINJA_API_KEY'])) {
	die('Set "ABANINJA_API_KEY" environment variable, so the tests can run' . PHP_EOL);
}
if (empty($_ENV['ABANINJA_ACCOUNT_UUID'])) {
	die('Set "ABANINJA_ACCOUNT_UUID" environment variable, so the tests can run' . PHP_EOL);
}
