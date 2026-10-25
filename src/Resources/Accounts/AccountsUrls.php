<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts;

final class AccountsUrls
{
    public const ACCOUNTS = '/api/{api_version}/accounts';
    public const ACCOUNT = '/api/{api_version}/accounts/{account_id}';
    public const ACCOUNT_ADDRESSES = '/api/{api_version}/accounts/{account_id}/addresses';
    public const ACCOUNT_BILLING_PREFERENCES = '/api/{api_version}/accounts/{account_id}/billing_preferences';
    public const ACCOUNT_CANCEL = '/api/{api_version}/accounts/{account_id}/cancel';
    public const ACCOUNT_CONTACTS = '/api/{api_version}/accounts/{account_id}/contacts';
    public const ACCOUNT_CREDIT_NOTES = '/api/{api_version}/accounts/{account_id}/credit_notes';
    public const ACCOUNT_CUSTOM_OBJECTS = '/api/{api_version}/accounts/{account_id}/custom_objects';
    public const ACCOUNT_IMAGE = '/api/{api_version}/accounts/{account_id}/image';
    public const ACCOUNT_INFORMATION = '/api/{api_version}/accounts/{account_id}/information';
    public const ACCOUNT_INVENTORIES = '/api/{api_version}/accounts/{account_id}/inventories';
    public const ACCOUNT_INVOICES = '/api/{api_version}/accounts/{account_id}/invoices';
    public const ACCOUNT_NOTES = '/api/{api_version}/accounts/{account_id}/notes';
    public const ACCOUNT_ORDERS = '/api/{api_version}/accounts/{account_id}/orders';
    public const ACCOUNT_PAYMENT_METHODS = '/api/{api_version}/accounts/{account_id}/payment_methods';
    public const ACCOUNT_PAYMENTS = '/api/{api_version}/accounts/{account_id}/payments';
    public const ACCOUNT_PURCHASE_INVOICES = '/api/{api_version}/accounts/{account_id}/purchase_invoices';
    public const ACCOUNT_PURCHASE_ORDERS = '/api/{api_version}/accounts/{account_id}/purchase_orders';
    public const ACCOUNT_PURCHASE_PAYMENTS = '/api/{api_version}/accounts/{account_id}/purchase_payments';
    public const ACCOUNT_PURCHASE_REFUNDS = '/api/{api_version}/accounts/{account_id}/purchase_refunds';
    public const ACCOUNT_QUOTE_PARTIAL_INVOICES = '/api/{api_version}/accounts/{account_id}/quote_partial_invoices';
    public const ACCOUNT_REFUNDS = '/api/{api_version}/accounts/{account_id}/refunds';
    public const ACCOUNT_SET_PASSWORD = '/api/{api_version}/accounts/{account_id}/set-password';
    public const ACCOUNT_ADDRESS = '/api/{api_version}/accounts/{account_id}/addresses/{sub_address_id}';
    public const ACCOUNT_COMMUNICATIONS_EMAILS = '/api/{api_version}/accounts/{account_id}/communications/emails';
    public const ACCOUNT_CONTACT = '/api/{api_version}/accounts/{account_id}/contacts/{sub_contact_id}';
    public const ACCOUNT_NOTE = '/api/{api_version}/accounts/{account_id}/notes/{account_note_id}';
    public const ACCOUNT_PAYMENT_METHOD = '/api/{api_version}/accounts/{account_id}/payment_methods/{sub_pm_id}';
    public const ACCOUNT_COMMUNICATIONS_EMAIL = '/api/{api_version}/accounts/{account_id}/communications/emails/{email_id}';
    public const ACCOUNT_NOTE_FILES = '/api/{api_version}/accounts/{account_id}/notes/{note_uuid}/files';
    public const ACCOUNT_NOTE_FILE = '/api/{api_version}/accounts/{account_id}/notes/{note_uuid}/files/{file_uuid}';
    public const ACCOUNT_REACTIVATE = '/api/{api_version}/accounts/{account_id}/reactivate';
    public const ACCOUNT_CUSTOM_OBJECT = '/api/{api_version}/accounts/{account_id}/custom_objects/{custom_object_id}';
    public const ACCOUNT_CUSTOM_OBJECT_INSTANCE = '/api/{api_version}/accounts/{account_id}/custom_objects_instances/{custom_object_instance_id}';
    public const ACCOUNT_PURGE = '/api/{api_version}/accounts/{account_id}/purge';
    public const ACCOUNT_KPIS = '/api/{api_version}/accounts/{account_id}/kpis';
    public const ACCOUNT_FINANCIAL_SUMMARY = '/api/{api_version}/accounts/{account_id}/financial_summary';
    public const ACCOUNT_CUSTOM_OBJECT_INSTANCE_OF = '/api/{api_version}/accounts/{account_id}/custom_objects/{custom_object_id}/instances/{custom_object_instance_id}';
    public const ACCOUNT_COMPONENT_OBJECTS = '/api/{api_version}/accounts/{account_id}/component/{component_id}';
    public const ACCOUNT_COMPONENT_OBJECT = '/api/{api_version}/accounts/{account_id}/component/{component_id}/{component_object_id}';

    /** The key the `ACCOUNTS` listing's records sit under. */
    public const ACCOUNTS_KEY = 'data';

    /** The key the `ACCOUNT_COMMUNICATIONS_EMAILS` listing's records sit under. */
    public const ACCOUNT_COMMUNICATIONS_EMAILS_KEY = 'data';

    /** The key the `ACCOUNT_CREDIT_NOTES` listing's records sit under. */
    public const ACCOUNT_CREDIT_NOTES_KEY = 'data';

    /** The key the `ACCOUNT_CUSTOM_OBJECTS` listing's records sit under. */
    public const ACCOUNT_CUSTOM_OBJECTS_KEY = 'data';

    /** The key the `ACCOUNT_INVOICES` listing's records sit under. */
    public const ACCOUNT_INVOICES_KEY = 'data';

    /** The key the `ACCOUNT_NOTES` listing's records sit under. */
    public const ACCOUNT_NOTES_KEY = 'data';

    /** The key the `ACCOUNT_NOTE_FILES` listing's records sit under. */
    public const ACCOUNT_NOTE_FILES_KEY = 'data';

    /** The key the `ACCOUNT_ORDERS` listing's records sit under. */
    public const ACCOUNT_ORDERS_KEY = 'data';

    /** The key the `ACCOUNT_PAYMENTS` listing's records sit under. */
    public const ACCOUNT_PAYMENTS_KEY = 'data';

    /** The key the `ACCOUNT_PURCHASE_INVOICES` listing's records sit under. */
    public const ACCOUNT_PURCHASE_INVOICES_KEY = 'data';

    /** The key the `ACCOUNT_PURCHASE_ORDERS` listing's records sit under. */
    public const ACCOUNT_PURCHASE_ORDERS_KEY = 'data';

    /** The key the `ACCOUNT_PURCHASE_PAYMENTS` listing's records sit under. */
    public const ACCOUNT_PURCHASE_PAYMENTS_KEY = 'data';

    /** The key the `ACCOUNT_PURCHASE_REFUNDS` listing's records sit under. */
    public const ACCOUNT_PURCHASE_REFUNDS_KEY = 'data';

    /** The key the `ACCOUNT_REFUNDS` listing's records sit under. */
    public const ACCOUNT_REFUNDS_KEY = 'data';

    /** The envelope one `account` record arrives under. */
    public const ACCOUNT_KEY = 'account';

    /** The envelope one `email` record arrives under. */
    public const EMAIL_KEY = 'email';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';

    /** The key the `ACCOUNT_COMPONENT_OBJECTS` listing's records sit under. */
    public const ACCOUNT_COMPONENT_OBJECTS_KEY = 'data';

    /** The key the `ACCOUNT_KPIS` listing's records sit under. */
    public const ACCOUNT_KPIS_KEY = 'account_kpis';

    /** The envelope one `custom_object` record arrives under. */
    public const CUSTOM_OBJECT_KEY = 'custom_object';

    /** The envelope one `custom_object_instance` record arrives under. */
    public const CUSTOM_OBJECT_INSTANCE_KEY = 'custom_object_instance';

    /** The envelope one `custom_component_object` record arrives under. */
    public const CUSTOM_COMPONENT_OBJECT_KEY = 'custom_component_object';

    /** The names that shape the listing; every other name is a `filter_<field>` or
     *  `filter_<field>_<operator>`, and an unknown one is `400` naming the field.
     *  @var list<string> */
    public const ACCOUNTS_QUERY_PARAMS = ['limit', 'cursor', 'sort'];
}
