<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Apis;

use DateTime;
use PHPCore\AbaNinja\Classes\Api;
use PHPCore\AbaNinja\Enums\DocumentAction;
use PHPCore\AbaNinja\Exceptions\ApiException;
use PHPCore\AbaNinja\Exceptions\RuntimeException;
use PHPCore\AbaNinja\Interfaces\IModel;
use PHPCore\AbaNinja\Models\ContractNote;
use PHPCore\AbaNinja\Models\CreditNote;
use PHPCore\AbaNinja\Models\DeliveryNote;
use PHPCore\AbaNinja\Models\Invoice;
use PHPCore\AbaNinja\Models\Queue;
use PHPCore\AbaNinja\Models\Quote;
use PHPCore\AbaNinja\Models\Receipt;
use PHPCore\AbaNinja\Models\RecurringInvoice;
use PHPCore\AbaNinja\Models\Template;

class Documents extends Api
{
	public function __construct(
		string $apiKey,
		string $accountUuid,
		string $baseUrl = 'https://api.abaninja.ch',
		string $apiVersion = 'v2'
	)
	{
		parent::__construct($apiKey, $accountUuid, 'documents', $baseUrl, $apiVersion);
	}

	/**
	 * @param string|IModel $model
	 *
	 * @return DocumentAction[]
	 * @throws RuntimeException|ApiException
	 */
	public function __getActions(string|IModel $model, string $documentUuid): array
	{
		$response = $this->get($model::getResourceUri() . '/' . $documentUuid . '/actions');
		return DocumentAction::fromMany($response->getResponse()->data);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getExistingQuote(string $documentUuid): Quote|IModel
	{
		return $this->__getOne(Quote::class, $documentUuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param DateTime|null $updatedSince
	 *
	 * @return Quote[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listQuotes(int $page = 1, ?int $limit = null, ?DateTime $updatedSince = null): array
	{
		return $this->__paginate(Quote::class, $page, $limit, [
			'updatedSince' => $updatedSince?->format('Y-m-d'),
		]);
	}

	/**
	 * @return DocumentAction[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getActionsForQuotes(string $documentUuid): array
	{
		return $this->__getActions(Quote::class, $documentUuid);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getExistingContractNote(string $documentUuid): ContractNote|IModel
	{
		return $this->__getOne(ContractNote::class, $documentUuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param DateTime|null $updatedSince
	 *
	 * @return ContractNote[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listContractNotes(int $page = 1, ?int $limit = null, ?DateTime $updatedSince = null): array
	{
		return $this->__paginate(ContractNote::class, $page, $limit, [
			'updatedSince' => $updatedSince?->format('Y-m-d'),
		]);
	}

	/**
	 * @return DocumentAction[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getActionsForContractNotes(string $documentUuid): array
	{
		return $this->__getActions(ContractNote::class, $documentUuid);
	}


	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getExistingDeliveryNote(string $documentUuid): DeliveryNote|IModel
	{
		return $this->__getOne(DeliveryNote::class, $documentUuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param DateTime|null $updatedSince
	 *
	 * @return DeliveryNote[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listDeliveryNotes(int $page = 1, ?int $limit = null, ?DateTime $updatedSince = null): array
	{
		return $this->__paginate(DeliveryNote::class, $page, $limit, [
			'updatedSince' => $updatedSince?->format('Y-m-d'),
		]);
	}

	/**
	 * @return DocumentAction[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getActionsForDeliveryNotes(string $documentUuid): array
	{
		return $this->__getActions(DeliveryNote::class, $documentUuid);
	}


	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getExistingInvoice(string $documentUuid): Invoice|IModel
	{
		return $this->__getOne(Invoice::class, $documentUuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param DateTime|null $updatedSince
	 *
	 * @return Invoice[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listInvoices(int $page = 1, ?int $limit = null, ?DateTime $updatedSince = null): array
	{
		return $this->__paginate(Invoice::class, $page, $limit, [
			'updatedSince' => $updatedSince?->format('Y-m-d'),
		]);
	}

	/**
	 * @return DocumentAction[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getActionsForInvoice(string $documentUuid): array
	{
		return $this->__getActions(Invoice::class, $documentUuid);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getExistingCreditNote(string $documentUuid): CreditNote|IModel
	{
		return $this->__getOne(CreditNote::class, $documentUuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param DateTime|null $updatedSince
	 *
	 * @return CreditNote[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listCreditNotes(int $page = 1, ?int $limit = null, ?DateTime $updatedSince = null): array
	{
		return $this->__paginate(CreditNote::class, $page, $limit, [
			'updatedSince' => $updatedSince?->format('Y-m-d'),
		]);
	}

	/**
	 * @return DocumentAction[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getActionsForCreditNote(string $documentUuid): array
	{
		return $this->__getActions(CreditNote::class, $documentUuid);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getExistingRecurringInvoice(string $documentUuid): RecurringInvoice|IModel
	{
		return $this->__getOne(RecurringInvoice::class, $documentUuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param DateTime|null $updatedSince
	 *
	 * @return RecurringInvoice[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listRecurringInvoices(int $page = 1, ?int $limit = null, ?DateTime $updatedSince = null): array
	{
		return $this->__paginate(RecurringInvoice::class, $page, $limit, [
			'updatedSince' => $updatedSince?->format('Y-m-d'),
		]);
	}

	/**
	 * @return DocumentAction[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getActionsForRecurringInvoice(string $documentUuid): array
	{
		return $this->__getActions(RecurringInvoice::class, $documentUuid);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getExistingTemplate(string $documentUuid): Template|IModel
	{
		return $this->__getOne(Template::class, $documentUuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param DateTime|null $updatedSince
	 *
	 * @return Template[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listTemplates(int $page = 1, ?int $limit = null, ?DateTime $updatedSince = null): array
	{
		return $this->__paginate(Template::class, $page, $limit, [
			'updatedSince' => $updatedSince?->format('Y-m-d'),
		]);
	}

	/**
	 * @return DocumentAction[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getActionsForTemplate(string $documentUuid): array
	{
		return $this->__getActions(Template::class, $documentUuid);
	}

	/**
	 * @param int $page
	 * @param int|null $limit
	 * @param DateTime|null $updatedSince
	 *
	 * @return Receipt[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function listReceipts(int $page = 1, ?int $limit = null, ?DateTime $updatedSince = null): array
	{
		return $this->__paginate(Receipt::class, $page, $limit, [
			'updatedSince' => $updatedSince?->format('Y-m-d'),
		]);
	}

	/**
	 * @return DocumentAction[]
	 * @throws ApiException
	 * @throws RuntimeException
	 */
	public function getActionsForReceipt(string $documentUuid): array
	{
		return $this->__getActions(Receipt::class, $documentUuid);
	}

	/**
	 * @throws RuntimeException
	 * @throws ApiException
	 */
	public function getExistingQueue(string $queueUuid): Queue|IModel
	{
		return $this->__getOne(Queue::class, $queueUuid);
	}
}
