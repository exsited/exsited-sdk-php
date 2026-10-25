<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\Reports\ReportsDto\ReportsAccountsAccountOverview;
use Exsited\Resources\Reports\ReportsDto\ReportsInvoicesInvoiceOverview;
use Exsited\Resources\Reports\ReportsDto\ReportsOrdersOrderOverview;
use Exsited\Resources\Reports\ReportsDto\ReportsPurchaseInvoicesPurchaseInvoiceOverview;
use Exsited\Resources\Reports\ReportsDto\ReportsPurchaseOrdersPurchaseOrderOverview;
use Exsited\Resources\Reports\ReportsDto\ReportsPurchaseTransactionsPurchasePaymentAndRefundOverview;
use Exsited\Resources\Reports\ReportsDto\ReportsTransactionsPaymentAndRefundOverview;

/** Report endpoints, under `/api/{api_version}/reports`. */
final class Reports
{
    /** Account overview report - `GET /reports/accounts/account_overview`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReportsAccountsAccountOverview(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReportsUrls::REPORTS_ACCOUNTS_ACCOUNT_OVERVIEW, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReportsAccountsAccountOverview::class);
    }

    /** Invoice overview report - `GET /reports/invoices/invoice_overview`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReportsInvoicesInvoiceOverview(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReportsUrls::REPORTS_INVOICES_INVOICE_OVERVIEW, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReportsInvoicesInvoiceOverview::class);
    }

    /** Order overview report - `GET /reports/orders/order_overview`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReportsOrdersOrderOverview(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReportsUrls::REPORTS_ORDERS_ORDER_OVERVIEW, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReportsOrdersOrderOverview::class);
    }

    /** Purchase invoice overview report - `GET
     *  /reports/purchase_invoices/purchase_invoice_overview`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReportsPurchaseInvoicesPurchaseInvoiceOverview(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReportsUrls::REPORTS_PURCHASE_INVOICES_PURCHASE_INVOICE_OVERVIEW, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReportsPurchaseInvoicesPurchaseInvoiceOverview::class);
    }

    /** Purchase order overview report - `GET /reports/purchase_orders/purchase_order_overview`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReportsPurchaseOrdersPurchaseOrderOverview(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReportsUrls::REPORTS_PURCHASE_ORDERS_PURCHASE_ORDER_OVERVIEW, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReportsPurchaseOrdersPurchaseOrderOverview::class);
    }

    /** Purchase payment and refund overview report - `GET
     *  /reports/purchase_transactions/purchase_payment_and_refund_overview`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReportsPurchaseTransactionsPurchasePaymentAndRefundOverview(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReportsUrls::REPORTS_PURCHASE_TRANSACTIONS_PURCHASE_PAYMENT_AND_REFUND_OVERVIEW, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReportsPurchaseTransactionsPurchasePaymentAndRefundOverview::class);
    }

    /** Payment and refund overview report - `GET
     *  /reports/transactions/payment_and_refund_overview`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getReportsTransactionsPaymentAndRefundOverview(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ReportsUrls::REPORTS_TRANSACTIONS_PAYMENT_AND_REFUND_OVERVIEW, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ReportsTransactionsPaymentAndRefundOverview::class);
    }
}
