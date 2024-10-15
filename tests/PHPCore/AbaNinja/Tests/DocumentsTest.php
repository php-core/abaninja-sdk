<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Tests\PHPCore\AbaNinja\Tests;

use PHPCore\AbaNinja\AbaNinja;
use PHPCore\AbaNinja\Enums\DocumentAction;
use PHPCore\AbaNinja\Exceptions\ScopeException;
use PHPCore\AbaNinja\Models\Invoice;
use PHPUnit\Framework\TestCase;

final class DocumentsTest extends TestCase
{
	public function testGetExistingQuote()
	{
		if (empty($_ENV['TEST_EXISTING_QUOTE_UUID'])) {
			self::markTestSkipped('To test getExistingQuote function, set "TEST_EXISTING_QUOTE_UUID" environment variable to a valid existing quotes UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_EXISTING_QUOTE_UUID'],
			AbaNinja::DocumentsApi()->getExistingQuote($_ENV['TEST_EXISTING_QUOTE_UUID'])->getUuid()
		);
	}

	public function testListQuotes()
	{
		$this->assertIsArray(
			AbaNinja::DocumentsApi()->listQuotes(1, 2)
		);
	}

	public function testGetActionsForQuotes()
	{
		if (empty($_ENV['TEST_EXISTING_QUOTE_UUID'])) {
			self::markTestSkipped('To test getActionsForQuotes function, set "TEST_EXISTING_QUOTE_UUID" environment variable to a valid existing quotes UUID on the account');
		}
		self::assertIsArray(
			$actions = AbaNinja::DocumentsApi()->getActionsForQuotes($_ENV['TEST_EXISTING_QUOTE_UUID'])
		);
		self::assertContains(DocumentAction::Archive, $actions);
	}

	public function testGetContractNote()
	{
		if (empty($_ENV['TEST_EXISTING_CONTRACT_NOTE_UUID'])) {
			self::markTestSkipped('To test getExistingContractNote function, set "TEST_EXISTING_CONTRACT_NOTE_UUID" environment variable to a valid existing contract notes UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_EXISTING_CONTRACT_NOTE_UUID'],
			AbaNinja::DocumentsApi()->getExistingContractNote($_ENV['TEST_EXISTING_CONTRACT_NOTE_UUID'])->getUuid()
		);
	}

	public function testListContractNotes()
	{
		$this->assertIsArray(
			AbaNinja::DocumentsApi()->listContractNotes(1, 2)
		);
	}

	public function testGetActionsForContractNotes()
	{
		if (empty($_ENV['TEST_EXISTING_CONTRACT_NOTE_UUID'])) {
			self::markTestSkipped('To test getActionsForContractNotes function, set "TEST_EXISTING_CONTRACT_NOTE_UUID" environment variable to a valid existing quotes UUID on the account');
		}
		self::assertIsArray(
			$actions = AbaNinja::DocumentsApi()->getActionsForContractNotes($_ENV['TEST_EXISTING_CONTRACT_NOTE_UUID'])
		);
		self::assertContains(DocumentAction::ConvertContractNoteToDeliveryNote, $actions);
	}

	public function testGetDeliveryNote()
	{
		if (empty($_ENV['TEST_EXISTING_DELIVERY_NOTE_UUID'])) {
			self::markTestSkipped('To test getExistingDeliveryNote function, set "TEST_EXISTING_DELIVERY_NOTE_UUID" environment variable to a valid existing delivery notes UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_EXISTING_DELIVERY_NOTE_UUID'],
			AbaNinja::DocumentsApi()->getExistingDeliveryNote($_ENV['TEST_EXISTING_DELIVERY_NOTE_UUID'])->getUuid()
		);
	}

	public function testListDeliveryNotes()
	{
		$this->assertIsArray(
			AbaNinja::DocumentsApi()->listDeliveryNotes(1, 2)
		);
	}

	public function testGetActionsForDeliveryNotes()
	{
		if (empty($_ENV['TEST_EXISTING_DELIVERY_NOTE_UUID'])) {
			self::markTestSkipped('To test getActionsForDeliveryNotes function, set "TEST_EXISTING_DELIVERY_NOTE_UUID" environment variable to a valid existing delivery notes UUID on the account');
		}
		self::assertIsArray(
			$actions = AbaNinja::DocumentsApi()->getActionsForDeliveryNotes($_ENV['TEST_EXISTING_DELIVERY_NOTE_UUID'])
		);
		self::assertContains(DocumentAction::ConvertDeliveryNoteToInvoice, $actions);
	}

	public function testGetInvoice()
	{
		if (empty($_ENV['TEST_EXISTING_INVOICE_UUID'])) {
			self::markTestSkipped('To test getExistingInvoice function, set "TEST_EXISTING_INVOICE_UUID" environment variable to a valid existing invoices UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_EXISTING_INVOICE_UUID'],
			AbaNinja::DocumentsApi()->getExistingInvoice($_ENV['TEST_EXISTING_INVOICE_UUID'])->getUuid()
		);
	}

	public function testListInvoices()
	{
		$this->assertIsArray(
			AbaNinja::DocumentsApi()->listInvoices(1, 2)
		);
	}

	public function testGetActionsForInvoice()
	{
		if (empty($_ENV['TEST_EXISTING_INVOICE_UUID'])) {
			self::markTestSkipped('To test getActionsForContractNotes function, set "TEST_EXISTING_INVOICE_UUID" environment variable to a valid existing invoices UUID on the account');
		}
		self::assertIsArray(
			$actions = AbaNinja::DocumentsApi()->getActionsForInvoice($_ENV['TEST_EXISTING_INVOICE_UUID'])
		);
		self::assertContains(DocumentAction::Activity, $actions);
	}

    public function testExecuteDownloadPDFActionForInvoice()
    {
        if (empty($_ENV['TEST_EXISTING_INVOICE_UUID'])) {
            self::markTestSkipped('To test testActionForInvoice function, set "TEST_EXISTING_INVOICE_UUID" environment variable to a valid existing invoices UUID on the account');
        }

        $this->assertArrayHasKey(
            'downloadUrl',
            AbaNinja::DocumentsApi()->executeAction(
                Invoice::class,
                $_ENV['TEST_EXISTING_INVOICE_UUID'],
                DocumentAction::DownloadPDF
            )->getData()
        );
    }

	public function testGetCreditNote()
	{
		if (empty($_ENV['TEST_EXISTING_CREDIT_NOTE_UUID'])) {
			self::markTestSkipped('To test getExistingCreditNote function, set "TEST_EXISTING_CREDIT_NOTE_UUID" environment variable to a valid existing credit notes UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_EXISTING_CREDIT_NOTE_UUID'],
			AbaNinja::DocumentsApi()->getExistingCreditNote($_ENV['TEST_EXISTING_CREDIT_NOTE_UUID'])->getUuid()
		);
	}

	public function testListCreditNotes()
	{
		$this->assertIsArray(
			AbaNinja::DocumentsApi()->listCreditNotes(1, 2)
		);
	}

	public function testGetActionsForCreditNote()
	{
		if (empty($_ENV['TEST_EXISTING_CREDIT_NOTE_UUID'])) {
			self::markTestSkipped('To test getActionsForCreditNote function, set "TEST_EXISTING_CREDIT_NOTE_UUID" environment variable to a valid existing credit notes UUID on the account');
		}
		self::assertIsArray(
			$actions = AbaNinja::DocumentsApi()->getActionsForCreditNote($_ENV['TEST_EXISTING_CREDIT_NOTE_UUID'])
		);
		self::assertContains(DocumentAction::Activity, $actions);
	}

	public function testGetRecurringInvoice()
	{
		if (empty($_ENV['TEST_EXISTING_RECURRING_INVOICE_UUID'])) {
			self::markTestSkipped('To test getExistingRecurringInvoice function, set "TEST_EXISTING_RECURRING_INVOICE_UUID" environment variable to a valid existing recurring invoices UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_EXISTING_RECURRING_INVOICE_UUID'],
			AbaNinja::DocumentsApi()->getExistingRecurringInvoice($_ENV['TEST_EXISTING_RECURRING_INVOICE_UUID'])->getUuid()
		);
	}

	public function testListRecurringInvoices()
	{
		$this->assertIsArray(
			AbaNinja::DocumentsApi()->listRecurringInvoices(1, 2)
		);
	}

	public function testGetActionsForRecurringInvoice()
	{
		if (empty($_ENV['TEST_EXISTING_RECURRING_INVOICE_UUID'])) {
			self::markTestSkipped('To test getActionsForCreditNote function, set "TEST_EXISTING_RECURRING_INVOICE_UUID" environment variable to a valid existing recurring invoices UUID on the account');
		}
		self::assertIsArray(
			$actions = AbaNinja::DocumentsApi()->getActionsForRecurringInvoice($_ENV['TEST_EXISTING_RECURRING_INVOICE_UUID'])
		);
		self::assertContains(DocumentAction::Activity, $actions);
	}

	public function testGetTemplate()
	{
		if (empty($_ENV['TEST_EXISTING_TEMPLATE_UUID'])) {
			self::markTestSkipped('To test getExistingTemplate function, set "TEST_EXISTING_TEMPLATE_UUID" environment variable to a valid existing template UUID on the account');
		}
		self::assertEquals(
			$_ENV['TEST_EXISTING_TEMPLATE_UUID'],
			AbaNinja::DocumentsApi()->getExistingTemplate($_ENV['TEST_EXISTING_TEMPLATE_UUID'])->getUuid()
		);
	}

	public function testListTemplates()
	{
		$this->assertIsArray(
			AbaNinja::DocumentsApi()->listTemplates(1, 2)
		);
	}

	public function testGetActionsForTemplate()
	{
		if (empty($_ENV['TEST_EXISTING_TEMPLATE_UUID'])) {
			self::markTestSkipped('To test getActionsForTemplate function, set "TEST_EXISTING_TEMPLATE_UUID" environment variable to a valid existing templates UUID on the account');
		}
		self::assertIsArray(
			$actions = AbaNinja::DocumentsApi()->getActionsForTemplate($_ENV['TEST_EXISTING_TEMPLATE_UUID'])
		);
		self::assertContains(DocumentAction::ConvertTemplateToInvoice, $actions);
	}

	public function testListReceipts()
	{
		try {
			$this->assertIsArray(
				AbaNinja::DocumentsApi()->listReceipts(1, 2)
			);
		} catch (ScopeException $exception) {
			self::markTestSkipped(
				$exception->getMessage()
				. PHP_EOL . 'To test listReceipts function, the API_KEY must be allowed to access invoices and suppliers'
			);
		}
	}

	public function testGetActionsForReceipt()
	{
		if (empty($_ENV['TEST_EXISTING_RECEIPT_UUID'])) {
			self::markTestSkipped('To test getActionsForReceipt function, set "TEST_EXISTING_RECEIPT_UUID" environment variable to a valid existing receipts UUID on the account');
		}
		self::assertIsArray(
			$actions = AbaNinja::DocumentsApi()->getActionsForReceipt($_ENV['TEST_EXISTING_RECEIPT_UUID'])
		);
		self::assertContains(DocumentAction::Activity, $actions);
	}

	public function testGetExistingQueue()
	{
		if (empty($_ENV['TEST_EXISTING_QUEUE_UUID'])) {
			self::markTestSkipped('To test getExistingRecurringInvoice function, set "TEST_EXISTING_QUEUE_UUID" environment variable to a valid existing queues UUID on the account');
		}
		$this->assertEquals(
			$_ENV['TEST_EXISTING_QUEUE_UUID'],
			AbaNinja::DocumentsApi()->getExistingQueue($_ENV['TEST_EXISTING_QUEUE_UUID'])->getUuid()
		);
	}
}
