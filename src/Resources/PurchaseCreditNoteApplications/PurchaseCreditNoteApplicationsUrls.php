<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseCreditNoteApplications;

final class PurchaseCreditNoteApplicationsUrls
{
    public const PURCHASE_CREDIT_NOTE_APPLICATIONS = '/api/{api_version}/purchase_credit_note_applications';
    public const PURCHASE_CREDIT_NOTE_APPLICATION = '/api/{api_version}/purchase_credit_note_applications/{purchase_credit_note_application_id}';

    /** The key the `PURCHASE_CREDIT_NOTE_APPLICATIONS` listing's records sit under. */
    public const PURCHASE_CREDIT_NOTE_APPLICATIONS_KEY = 'data';

    /** The envelope one `purchase_credit_note_application` record arrives under. */
    public const PURCHASE_CREDIT_NOTE_APPLICATION_KEY = 'purchase_credit_note_application';
}
