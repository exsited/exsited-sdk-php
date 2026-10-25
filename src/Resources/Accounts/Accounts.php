<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountAddress;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountAddresses;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountBillingPreferences;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountCommunicationsEmail;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountCommunicationsEmailList;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountComponentObject;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountContact;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountContacts;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountCustomObjectList;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountCustomObjectRead;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountFinancialSummary;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountImage;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountImageRead;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountInformation;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountInventories;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountKpis;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountList;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountNote;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountNoteFile;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountNoteFiles;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountNoteList;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountOrders;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountPaymentMethod;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountPaymentMethods;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountQuotePartialInvoices;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountRead;
use Exsited\Sdk\Resources\Accounts\AccountsDto\AccountSetPassword;
use Exsited\Sdk\Resources\Accounts\AccountsDto\ComponentObjects;

/** Account endpoints, under `/api/{api_version}/accounts`. */
final class Accounts
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List accounts - `GET /accounts`; `AccountsUrls::ACCOUNTS_QUERY_PARAMS` shape the listing.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccounts(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNTS, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountList::class);
    }

    /** Delete an account - `DELETE /accounts/{account_id}`. */
    public static function deleteAccount(ExsitedClient $client, int|string $accountId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountsUrls::ACCOUNT, pathParams: ['account_id' => $accountId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve one account - `GET /accounts/{account_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccount(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** List an account's addresses - `GET /accounts/{account_id}/addresses`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountAddresses(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_ADDRESSES, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountAddresses::class);
    }

    /** Add addresses to an account - `POST /accounts/{account_id}/addresses`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createAccountAddress(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_ADDRESSES, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountImage::class);
    }

    /** Retrieve an account's billing preferences - `GET
     *  /accounts/{account_id}/billing_preferences`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountBillingPreferences(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_BILLING_PREFERENCES, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountBillingPreferences::class);
    }

    /** Replace an account's billing preferences - `PUT
     *  /accounts/{account_id}/billing_preferences`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function replaceAccountBillingPreferences(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPutRequest(AccountsUrls::ACCOUNT_BILLING_PREFERENCES, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountBillingPreferences::class);
    }

    /** Cancel an account - `POST /accounts/{account_id}/cancel`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function cancelAccount(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_CANCEL, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** List an account's contacts - `GET /accounts/{account_id}/contacts`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountContacts(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_CONTACTS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountContacts::class);
    }

    /** List an account's credit notes - `GET /accounts/{account_id}/credit_notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountCreditNotes(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_CREDIT_NOTES, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List the custom objects on an account - `GET /accounts/{account_id}/custom_objects`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountCustomObjects(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_CUSTOM_OBJECTS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountCustomObjectList::class);
    }

    /** Remove the account's image - `DELETE /accounts/{account_id}/image`. */
    public static function deleteAccountImage(ExsitedClient $client, int|string $accountId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountsUrls::ACCOUNT_IMAGE, pathParams: ['account_id' => $accountId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Retrieve the account's image reference - `GET /accounts/{account_id}/image`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountImage(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_IMAGE, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountImageRead::class);
    }

    /** Set the account's image - `POST /accounts/{account_id}/image`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function imageAccount(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_IMAGE, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountImage::class);
    }

    /** Retrieve an account's core information - `GET /accounts/{account_id}/information`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountInformation(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_INFORMATION, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountInformation::class);
    }

    /** Update an account's core information - `PATCH
     *  /accounts/{account_id}/information`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateAccountInformation(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AccountsUrls::ACCOUNT_INFORMATION, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountInformation::class);
    }

    /** List an account's inventories - `GET /accounts/{account_id}/inventories`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountInventories(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_INVENTORIES, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountInventories::class);
    }

    /** List an account's invoices - `GET /accounts/{account_id}/invoices`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountInvoices(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_INVOICES, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List an account's notes - `GET /accounts/{account_id}/notes`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountNotes(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_NOTES, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountNoteList::class);
    }

    /** Attach a note to an account - `POST /accounts/{account_id}/notes`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function createAccountNote(ExsitedClient $client, int|string $accountId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_NOTES, pathParams: ['account_id' => $accountId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountNote::class);
    }

    /** List an account's orders - `GET /accounts/{account_id}/orders`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountOrders(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_ORDERS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List an account's payment methods - `GET /accounts/{account_id}/payment_methods`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountPaymentMethods(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_PAYMENT_METHODS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountPaymentMethods::class);
    }

    /** List an account's payments - `GET /accounts/{account_id}/payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountPayments(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_PAYMENTS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List an account's purchase invoices - `GET /accounts/{account_id}/purchase_invoices`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountPurchaseInvoices(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_PURCHASE_INVOICES, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List an account's purchase orders - `GET /accounts/{account_id}/purchase_orders`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountPurchaseOrders(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_PURCHASE_ORDERS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List an account's purchase payments - `GET /accounts/{account_id}/purchase_payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountPurchasePayments(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_PURCHASE_PAYMENTS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List an account's purchase refunds - `GET /accounts/{account_id}/purchase_refunds`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountPurchaseRefunds(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_PURCHASE_REFUNDS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** List an account's partial invoices from quotes - `GET
     *  /accounts/{account_id}/quote_partial_invoices`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountQuotePartialInvoices(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_QUOTE_PARTIAL_INVOICES, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountQuotePartialInvoices::class);
    }

    /** List an account's refunds - `GET /accounts/{account_id}/refunds`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountRefunds(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_REFUNDS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountOrders::class);
    }

    /** Set the account's portal password - `POST /accounts/{account_id}/set-password`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function setPasswordAccount(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_SET_PASSWORD, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountSetPassword::class);
    }

    /** Retrieve one address - `GET
     *  /accounts/{account_id}/addresses/{sub_address_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountAddress(ExsitedClient $client, int|string $accountId, int|string $subAddressId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_ADDRESS, pathParams: ['account_id' => $accountId, 'sub_address_id' => $subAddressId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountAddress::class);
    }

    /** Delete one address - `DELETE /accounts/{account_id}/addresses/{sub_address_id}`. */
    public static function deleteAccountAddress(ExsitedClient $client, int|string $accountId, int|string $subAddressId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountsUrls::ACCOUNT_ADDRESS, pathParams: ['account_id' => $accountId, 'sub_address_id' => $subAddressId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update one address - `PATCH /accounts/{account_id}/addresses/{sub_address_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateAccountAddress(ExsitedClient $client, int|string $accountId, int|string $subAddressId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AccountsUrls::ACCOUNT_ADDRESS, pathParams: ['account_id' => $accountId, 'sub_address_id' => $subAddressId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountAddresses::class);
    }

    /** List the emails sent to or from an account - `GET
     *  /accounts/{account_id}/communications/emails`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountCommunicationsEmails(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_COMMUNICATIONS_EMAILS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountCommunicationsEmailList::class);
    }

    /** Retrieve one contact - `GET
     *  /accounts/{account_id}/contacts/{sub_contact_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountContact(ExsitedClient $client, int|string $accountId, int|string $subContactId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_CONTACT, pathParams: ['account_id' => $accountId, 'sub_contact_id' => $subContactId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountContact::class);
    }

    /** Delete one contact - `DELETE /accounts/{account_id}/contacts/{sub_contact_id}`. */
    public static function deleteAccountContact(ExsitedClient $client, int|string $accountId, int|string $subContactId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountsUrls::ACCOUNT_CONTACT, pathParams: ['account_id' => $accountId, 'sub_contact_id' => $subContactId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update one contact - `PATCH /accounts/{account_id}/contacts/{sub_contact_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateAccountContact(ExsitedClient $client, int|string $accountId, int|string $subContactId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AccountsUrls::ACCOUNT_CONTACT, pathParams: ['account_id' => $accountId, 'sub_contact_id' => $subContactId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountContacts::class);
    }

    /** Replace one contact - `PUT /accounts/{account_id}/contacts/{sub_contact_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function replaceAccountContact(ExsitedClient $client, int|string $accountId, int|string $subContactId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPutRequest(AccountsUrls::ACCOUNT_CONTACT, pathParams: ['account_id' => $accountId, 'sub_contact_id' => $subContactId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountContacts::class);
    }

    /** Delete one note - `DELETE /accounts/{account_id}/notes/{account_note_id}`. */
    public static function deleteAccountNote(ExsitedClient $client, int|string $accountId, int|string $accountNoteId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountsUrls::ACCOUNT_NOTE, pathParams: ['account_id' => $accountId, 'account_note_id' => $accountNoteId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a note - `PATCH /accounts/{account_id}/notes/{account_note_id}`.
     *  Sent as a form: the text as the `note` field, with any `$files` as multipart parts.
     *  @param array<string,mixed>|null $files the file parts, as the client's `files` takes them */
    public static function updateAccountNote(ExsitedClient $client, int|string $accountId, int|string $accountNoteId, string $note, ?array $files = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requireNote($note);
        return $client->sendPatchRequest(AccountsUrls::ACCOUNT_NOTE, pathParams: ['account_id' => $accountId, 'account_note_id' => $accountNoteId], formData: ['note' => $note], files: $files, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountNote::class);
    }

    /** Retrieve one note - `GET /accounts/{account_id}/notes/{account_note_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountNote(ExsitedClient $client, int|string $accountId, int|string $accountNoteId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_NOTE, pathParams: ['account_id' => $accountId, 'account_note_id' => $accountNoteId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountNote::class);
    }

    /** Retrieve one payment method - `GET /accounts/{account_id}/payment_methods/{sub_pm_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountPaymentMethod(ExsitedClient $client, int|string $accountId, int|string $subPmId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_PAYMENT_METHOD, pathParams: ['account_id' => $accountId, 'sub_pm_id' => $subPmId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountPaymentMethod::class);
    }

    /** Delete one payment method - `DELETE /accounts/{account_id}/payment_methods/{sub_pm_id}`. */
    public static function deleteAccountPaymentMethod(ExsitedClient $client, int|string $accountId, int|string $subPmId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountsUrls::ACCOUNT_PAYMENT_METHOD, pathParams: ['account_id' => $accountId, 'sub_pm_id' => $subPmId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update one payment method - `PATCH /accounts/{account_id}/payment_methods/{sub_pm_id}`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateAccountPaymentMethod(ExsitedClient $client, int|string $accountId, int|string $subPmId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AccountsUrls::ACCOUNT_PAYMENT_METHOD, pathParams: ['account_id' => $accountId, 'sub_pm_id' => $subPmId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountPaymentMethod::class);
    }

    /** Retrieve one email - `GET /accounts/{account_id}/communications/emails/{email_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountCommunicationsEmail(ExsitedClient $client, int|string $accountId, int|string $emailId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_COMMUNICATIONS_EMAIL, pathParams: ['account_id' => $accountId, 'email_id' => $emailId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountCommunicationsEmail::class);
    }

    /** List a note's attachments - `GET /accounts/{account_id}/notes/{note_uuid}/files`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountNoteFiles(ExsitedClient $client, int|string $accountId, int|string $noteUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_NOTE_FILES, pathParams: ['account_id' => $accountId, 'note_uuid' => $noteUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountNoteFiles::class);
    }

    /** Retrieve one attachment - `GET
     *  /accounts/{account_id}/notes/{note_uuid}/files/{file_uuid}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountNoteFile(ExsitedClient $client, int|string $accountId, int|string $noteUuid, int|string $fileUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_NOTE_FILE, pathParams: ['account_id' => $accountId, 'note_uuid' => $noteUuid, 'file_uuid' => $fileUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountNoteFile::class);
    }

    /** Create an account - `POST /accounts`; answered `201`, under `account`. `name` and `type`
     *  are required, and `POST /accounts/{account_id}` is a `400`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createAccount(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNTS, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** Replace an account - `PUT /accounts/{account_id}`, wrapped in `account`. `name` and `type`
     *  are required on every call, and a field the body omits is kept, not cleared.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function replaceAccount(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPutRequest(AccountsUrls::ACCOUNT, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** Reactivate a cancelled account - `POST /accounts/{account_id}/reactivate`, the body
     *  `cancelAccount` takes; a null `effective_date` means now.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function reactivateAccount(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_REACTIVATE, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** Add contacts to an account - `POST /accounts/{account_id}/contacts`; answered `201`. A list
     *  under `contacts`, each with its slot as `type` (`CONTACT_1`) in the body.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createAccountContacts(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_CONTACTS, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** Replace one address - `PUT /accounts/{account_id}/addresses/{address_id}`, under a singular
     *  `address`; `address_line_1` and `country` are required.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function replaceAccountAddress(ExsitedClient $client, int|string $accountId, int|string $subAddressId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPutRequest(AccountsUrls::ACCOUNT_ADDRESS, pathParams: ['account_id' => $accountId, 'sub_address_id' => $subAddressId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** Add one payment method - `POST /accounts/{account_id}/payment_methods`; answered `201`. One
     *  object under `payment_method`, not a list; the first method becomes the default.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createAccountPaymentMethod(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_PAYMENT_METHODS, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** Replace one payment method - `PUT
     *  /accounts/{account_id}/payment_methods/{payment_method_id}`; `name` is required, and
     *  `processor_type` and `payment_processor` are refused.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function replaceAccountPaymentMethod(ExsitedClient $client, int|string $accountId, int|string $subPmId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPutRequest(AccountsUrls::ACCOUNT_PAYMENT_METHOD, pathParams: ['account_id' => $accountId, 'sub_pm_id' => $subPmId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** Create a custom object instance on an account - `POST
     *  /accounts/{account_id}/custom_objects/{custom_object_id}`, the schema's `co_` id. Answers
     *  `custom_object_instance`, with no typed view.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createAccountCustomObjectInstance(ExsitedClient $client, int|string $accountId, int|string $customObjectId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_CUSTOM_OBJECT, pathParams: ['account_id' => $accountId, 'custom_object_id' => $customObjectId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Update a custom object instance - `PATCH
     *  /accounts/{account_id}/custom_objects_instances/{custom_object_instance_id}`, the
     *  instance's `coi_` id; answered with the account.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateAccountCustomObjectInstance(ExsitedClient $client, int|string $accountId, int|string $customObjectInstanceId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(AccountsUrls::ACCOUNT_CUSTOM_OBJECT_INSTANCE, pathParams: ['account_id' => $accountId, 'custom_object_instance_id' => $customObjectInstanceId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountRead::class);
    }

    /** Send an email and log it on the account - `POST
     *  /accounts/{account_id}/communications/emails`; `to`, `subject`, `body`, `cc` and `bcc` with
     *  no envelope. It sends real mail and names no view.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function sendAccountEmail(ExsitedClient $client, int|string $accountId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_COMMUNICATIONS_EMAILS, pathParams: ['account_id' => $accountId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Purge an account and its records permanently - `POST /accounts/{account_id}/purge`; `204`,
     *  no body sent. There is no undo. */
    public static function purgeAccount(ExsitedClient $client, int|string $accountId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendPostRequest(AccountsUrls::ACCOUNT_PURGE, pathParams: ['account_id' => $accountId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** The account's revenue and order counters - `GET /accounts/{account_id}/kpis`, under
     *  `account_kpis`; the money fields are strings, `"0.00"`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountKpis(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_KPIS, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountKpis::class);
    }

    /** The account's invoice totals - `GET /accounts/{account_id}/financial_summary`, under
     *  `account`, beside its `name`; the money fields are strings.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountFinancialSummary(ExsitedClient $client, int|string $accountId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_FINANCIAL_SUMMARY, pathParams: ['account_id' => $accountId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountFinancialSummary::class);
    }

    /** One custom object with this account's instances of it - `GET
     *  /accounts/{account_id}/custom_objects/{custom_object_id}`, the `co_` id, under
     *  `custom_object`; the instances are paged inside it.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountCustomObject(ExsitedClient $client, int|string $accountId, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_CUSTOM_OBJECT, pathParams: ['account_id' => $accountId, 'custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountCustomObjectRead::class);
    }

    /** One custom object instance - `GET
     *  /accounts/{account_id}/custom_objects/{custom_object_id}/instances/{custom_object_instance_id}`,
     *  the `coi_` id, under `custom_object_instance`, with no typed view.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountCustomObjectInstance(ExsitedClient $client, int|string $accountId, int|string $customObjectId, int|string $customObjectInstanceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_CUSTOM_OBJECT_INSTANCE_OF, pathParams: ['account_id' => $accountId, 'custom_object_id' => $customObjectId, 'custom_object_instance_id' => $customObjectInstanceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List a component's objects under an account and its child accounts - `GET
     *  /accounts/{account_id}/component/{component_id}`, the `cmp_` id; cursor paged.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountComponentObjects(ExsitedClient $client, int|string $accountId, int|string $componentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_COMPONENT_OBJECTS, pathParams: ['account_id' => $accountId, 'component_id' => $componentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ComponentObjects::class);
    }

    /** One component object under an account - `GET
     *  /accounts/{account_id}/component/{component_id}/{component_object_id}`, the `cco_` id,
     *  under `custom_component_object`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getAccountComponentObject(ExsitedClient $client, int|string $accountId, int|string $componentId, int|string $componentObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(AccountsUrls::ACCOUNT_COMPONENT_OBJECT, pathParams: ['account_id' => $accountId, 'component_id' => $componentId, 'component_object_id' => $componentObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: AccountComponentObject::class);
    }

    /** Delete one note attachment - `DELETE
     *  /accounts/{account_id}/notes/{note_id}/files/{file_id}`, the attachment's `uuid`. */
    public static function deleteAccountNoteFile(ExsitedClient $client, int|string $accountId, int|string $noteUuid, int|string $fileUuid, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(AccountsUrls::ACCOUNT_NOTE_FILE, pathParams: ['account_id' => $accountId, 'note_uuid' => $noteUuid, 'file_uuid' => $fileUuid], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    private static function requirePayload(array|string|Dto $payload): void
    {
        if ($payload === [] || (is_string($payload) && trim($payload) === '')) {
            throw new SdkUsageError(
                'payload is required: this endpoint takes a body, and an empty one '
                . 'sends the request with nothing in it'
            );
        }
    }

    /** A blank note would be sent and stored as an empty note. */
    private static function requireNote(string $note): void
    {
        if (trim($note) === '') {
            throw new SdkUsageError(
                'note is required: the note text is the body of this request, and a blank one '
                . 'would be stored as an empty note'
            );
        }
    }
}
