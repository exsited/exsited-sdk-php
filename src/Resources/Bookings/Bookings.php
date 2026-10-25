<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings;

use Exsited\Sdk\Client\ApiResponse;
use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ExsitedClient;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingBillingPreferencesView;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingById;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingCustomObject;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingCustomObjectList;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingInvoiceList;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingItemFulfillment;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingKpis;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingLine;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingList;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingNoteList;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingPaymentList;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingPaymentMethod;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingPaymentMethods;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingPaymentView;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingPdf;
use Exsited\Sdk\Resources\Bookings\BookingsDto\BookingQuotePartialInvoices;

/** Booking endpoints, under `/api/{api_version}/booking`. */
final class Bookings
{
    /** The key a listing puts its records under. */
    public const RECORD_KEY = 'data';

    /** List all bookings - `GET /booking`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBooking(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingList::class);
    }

    /** Get single booking - `GET /booking/{booking_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingById(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_BY_ID, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingById::class);
    }

    /** Create a booking - `POST /booking`, the `createOrder` body under `order`; `201`, answered
     *  under `booking`. Each line needs a labour and its booking times.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createBooking(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(BookingsUrls::BOOKING, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Price a booking without creating it - `POST /booking/preview`, the `createBooking` body;
     *  `201`, with no cart data in the answer, under `booking`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function previewBooking(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(BookingsUrls::BOOKING_PREVIEW, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Delete a booking - `DELETE /booking/{booking_id}`; `204`. The server deletes any order by
     *  this path, whatever its type. */
    public static function deleteBooking(ExsitedClient $client, int|string $bookingId, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendDeleteRequest(BookingsUrls::BOOKING_BY_ID, pathParams: ['booking_id' => $bookingId], raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List the notes of every order - `GET /booking/notes`, the same list as
     *  `orders.get_orders_notes`; `/booking/{booking_id}/notes` is refused.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingNotes(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_NOTES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingNoteList::class);
    }

    /** A booking's billing preferences - `GET /booking/{booking_id}/billing_preferences`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingBillingPreferences(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_BILLING_PREFERENCES, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingBillingPreferencesView::class);
    }

    /** Update a booking's billing preferences - `PATCH /booking/{booking_id}/billing_preferences`,
     *  body `order.billing_preferences`; answered with the whole booking under `order`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateBookingBillingPreferences(ExsitedClient $client, int|string $bookingId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(BookingsUrls::BOOKING_BILLING_PREFERENCES, pathParams: ['booking_id' => $bookingId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingById::class);
    }

    /** Change a booking - `POST /booking/{booking_id}/change`, body under `booking`:
     *  `effective_date` and `lines`. Only a booking-type order is accepted.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function changeBooking(ExsitedClient $client, int|string $bookingId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(BookingsUrls::BOOKING_CHANGE, pathParams: ['booking_id' => $bookingId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** Preview a booking change - `POST /booking/{booking_id}/change/preview`, the `changeBooking`
     *  body; nothing is changed.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function previewBookingChange(ExsitedClient $client, int|string $bookingId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(BookingsUrls::BOOKING_CHANGE_PREVIEW, pathParams: ['booking_id' => $bookingId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** A booking's header - `GET /booking/{booking_id}/information`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingInformation(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_INFORMATION, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingById::class);
    }

    /** Update a booking's header - `PATCH /booking/{booking_id}/information`, body under `order`;
     *  answered with the whole booking under `order`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateBookingInformation(ExsitedClient $client, int|string $bookingId, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(BookingsUrls::BOOKING_INFORMATION, pathParams: ['booking_id' => $bookingId], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingById::class);
    }

    /** A booking with its lines - `GET /booking/{booking_id}/lines`, under `order`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingLines(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_LINES, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingById::class);
    }

    /** One booking line - `GET /booking/{booking_id}/lines/{line_uuid}`, under `order_line`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingLine(ExsitedClient $client, int|string $bookingId, int|string $lineUuid, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_LINE, pathParams: ['booking_id' => $bookingId, 'line_uuid' => $lineUuid], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingLine::class);
    }

    /** Update a booking line - `PATCH /booking/{booking_id}/lines/{line_uuid}`, body `order.line`;
     *  answered with the whole booking under `order`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateBookingLine(ExsitedClient $client, int|string $bookingId, int|string $lineUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(BookingsUrls::BOOKING_LINE, pathParams: ['booking_id' => $bookingId, 'line_uuid' => $lineUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingById::class);
    }

    /** Update a line's billing preferences - `PATCH
     *  /booking/{booking_id}/lines/{line_uuid}/billing_preferences`, body
     *  `order.line.item_properties`, not `billing_preferences`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateBookingLineBillingPreferences(ExsitedClient $client, int|string $bookingId, int|string $lineUuid, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(BookingsUrls::BOOKING_LINE_BILLING_PREFERENCES, pathParams: ['booking_id' => $bookingId, 'line_uuid' => $lineUuid], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingById::class);
    }

    /** List the custom objects orders use, with the booking's instances - `GET
     *  /booking/{booking_id}/custom_objects`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingCustomObjects(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_CUSTOM_OBJECTS, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingCustomObjectList::class);
    }

    /** One custom object with the booking's instances of it - `GET
     *  /booking/{booking_id}/custom_objects/{custom_object_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingCustomObject(ExsitedClient $client, int|string $bookingId, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_CUSTOM_OBJECT, pathParams: ['booking_id' => $bookingId, 'custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingCustomObject::class);
    }

    /** One custom object instance - `GET
     *  /booking/{booking_id}/custom_objects/{custom_object_id}/instances/{instance_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingCustomObjectInstance(ExsitedClient $client, int|string $bookingId, int|string $customObjectId, int|string $instanceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_CUSTOM_OBJECT_INSTANCE, pathParams: ['booking_id' => $bookingId, 'custom_object_id' => $customObjectId, 'instance_id' => $instanceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** The server's alias of `getBookingCustomObjects` - `GET
     *  /booking/{booking_id}/custom_objects_instances`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingCustomObjectsInstances(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_CUSTOM_OBJECTS_INSTANCES, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingCustomObjectList::class);
    }

    /** The server's alias of `getBookingCustomObject` - `GET
     *  /booking/{booking_id}/custom_objects_instances/{custom_object_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingCustomObjectsInstance(ExsitedClient $client, int|string $bookingId, int|string $customObjectId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_CUSTOM_OBJECTS_INSTANCE, pathParams: ['booking_id' => $bookingId, 'custom_object_id' => $customObjectId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingCustomObject::class);
    }

    /** The server's alias of `getBookingCustomObjectInstance` - `GET /booking/
     *  {booking_id}/custom_objects_instances/{custom_object_id}/instances/{instance_id}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingCustomObjectsInstanceInstance(ExsitedClient $client, int|string $bookingId, int|string $customObjectId, int|string $instanceId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_CUSTOM_OBJECTS_INSTANCE_INSTANCE, pathParams: ['booking_id' => $bookingId, 'custom_object_id' => $customObjectId, 'instance_id' => $instanceId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** List a booking's invoices - `GET /booking/{booking_id}/invoices`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingInvoices(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_INVOICES, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingInvoiceList::class);
    }

    /** List a booking's fulfillments - `GET /booking/{booking_id}/item_fulfillments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingItemFulfillments(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_ITEM_FULFILLMENTS, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
    }

    /** One fulfillment - `GET /booking/{booking_id}/item_fulfillments/{fulfillment_id}`; the
     *  server does not check that the fulfillment belongs to the booking.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingItemFulfillment(ExsitedClient $client, int|string $bookingId, int|string $fulfillmentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_ITEM_FULFILLMENT, pathParams: ['booking_id' => $bookingId, 'fulfillment_id' => $fulfillmentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingItemFulfillment::class);
    }

    /** A booking's KPIs - `GET /booking/{booking_id}/kpis`, under `order_kpis`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingKpis(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_KPIS, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingKpis::class);
    }

    /** The payment methods bound to a booking - `GET /booking/{booking_id}/payment_methods`; `404`
     *  when none is.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingPaymentMethods(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_PAYMENT_METHODS, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingPaymentMethods::class);
    }

    /** One bound payment method, by its reference - `GET
     *  /booking/{booking_id}/payment_methods/{payment_method_ref}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingPaymentMethod(ExsitedClient $client, int|string $bookingId, int|string $paymentMethodRef, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_PAYMENT_METHOD, pathParams: ['booking_id' => $bookingId, 'payment_method_ref' => $paymentMethodRef], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingPaymentMethod::class);
    }

    /** List a booking's payments - `GET /booking/{booking_id}/payments`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingPayments(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_PAYMENTS, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingPaymentList::class);
    }

    /** One payment - `GET /booking/{booking_id}/payments/{payment_id}`; the server does not check
     *  that the payment belongs to the booking.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingPayment(ExsitedClient $client, int|string $bookingId, int|string $paymentId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_PAYMENT, pathParams: ['booking_id' => $bookingId, 'payment_id' => $paymentId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingPaymentView::class);
    }

    /** A booking's PDF links - `GET /booking/{booking_id}/pdf`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingPdf(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_PDF, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingPdf::class);
    }

    /** The deposit and instalment invoices of a converted quote - `GET
     *  /booking/{booking_id}/quote_partial_invoices`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingQuotePartialInvoices(ExsitedClient $client, int|string $bookingId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_QUOTE_PARTIAL_INVOICES, pathParams: ['booking_id' => $bookingId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: BookingQuotePartialInvoices::class);
    }

    /** A shipping line's PDF - `GET /booking/{booking_id}/shipping_pdf/{shipping_line_id}`; `404`
     *  until the line has a generated shipping PDF.
     *  @param array<string,mixed>|null $queryParams */
    public static function getBookingShippingPdf(ExsitedClient $client, int|string $bookingId, int|string $shippingLineId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(BookingsUrls::BOOKING_SHIPPING_PDF, pathParams: ['booking_id' => $bookingId, 'shipping_line_id' => $shippingLineId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat);
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
}
