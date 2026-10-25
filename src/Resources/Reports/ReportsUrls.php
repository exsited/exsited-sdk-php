<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports;

final class ReportsUrls
{
    public const REPORTS_ACCOUNTS_ACCOUNT_OVERVIEW = '/api/{api_version}/reports/accounts/account_overview';
    public const REPORTS_INVOICES_INVOICE_OVERVIEW = '/api/{api_version}/reports/invoices/invoice_overview';
    public const REPORTS_ORDERS_ORDER_OVERVIEW = '/api/{api_version}/reports/orders/order_overview';
    public const REPORTS_PURCHASE_INVOICES_PURCHASE_INVOICE_OVERVIEW = '/api/{api_version}/reports/purchase_invoices/purchase_invoice_overview';
    public const REPORTS_PURCHASE_ORDERS_PURCHASE_ORDER_OVERVIEW = '/api/{api_version}/reports/purchase_orders/purchase_order_overview';
    public const REPORTS_PURCHASE_TRANSACTIONS_PURCHASE_PAYMENT_AND_REFUND_OVERVIEW = '/api/{api_version}/reports/purchase_transactions/purchase_payment_and_refund_overview';
    public const REPORTS_TRANSACTIONS_PAYMENT_AND_REFUND_OVERVIEW = '/api/{api_version}/reports/transactions/payment_and_refund_overview';

    /** The envelope one `report` record arrives under. */
    public const REPORT_KEY = 'report';
}
