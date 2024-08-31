<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       31.8.2024
 */

namespace PHPCore\AbaNinja\Enums;

use stdClass;

enum DocumentAction: string
{
	case Archive = 'archive';
	case Activity = 'activity';
	case Clone = 'clone';
	case Cancel = 'cancel';
	case ConvertToInvoice = 'convert';
	case ConvertToContractNote = 'convertCN';
	case ConvertContractNoteToDeliveryNote = 'convertCNDN';
	case ConvertContractNoteToInvoice = 'convertCNI';
	case ConvertDeliveryNoteToInvoice = 'convertDNI';
	case ConvertInvoiceToCreditNote = 'convertIC';
	case ConvertInvoiceToDeliveryNote = 'convertDN';
	case ConvertInvoiceToTemplate = 'convertT';
	case ConvertTemplateToInvoice = 'convertTI';
	case ConvertDocumentToTemplate = 'convertToTemplate';
	case ConvertDocumentToQuote = 'convertToQuote';
	case ConvertDocumentToDeliveryNote = 'convertToDeliveryNote';
	case ConvertDocumentToCreditNote = 'convertToCreditNote';
	case ConvertDocumentToContractNote = 'convertToContractNote';
	case CustomerPortalUrl = 'customerPortalUrl';
	case Delete = 'delete';
	case DownloadPaymentConfirmation = 'downloadPaymentConfirmation';
	case DownloadPDF = 'downloadPdf';
	case MarkAsApproved = 'markApproved';
	case MarkAsDeclined = 'markDeclined';
	case MarkAsSent = 'markSent';
	case Print = 'print';
	case PrintReminder = 'dunningPrint';
	case Restore = 'restore';
	case SendEmail = 'email';
	case SendPaymentConfirmation = 'sendPaymentConfirmation';
	case SendReminder = 'dunningSent';

	public static function fromMany(stdClass|array $data): array
	{
		return array_map(function ($key) {
			return self::from($key);
		}, is_array($data)
			? $data
			: array_keys((array)$data)
		);
	}
}
