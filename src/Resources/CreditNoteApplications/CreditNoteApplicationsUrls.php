<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNoteApplications;

final class CreditNoteApplicationsUrls
{
    public const CREDIT_NOTE_APPLICATIONS = '/api/{api_version}/credit_note_applications';
    public const CREDIT_NOTE_APPLICATION = '/api/{api_version}/credit_note_applications/{credit_note_application_id}';
    public const INVOICE_CREDIT_NOTE_APPLICATIONS = '/api/{api_version}/invoices/{invoice_id}/credit_note_applications';

    /** The key the `CREDIT_NOTE_APPLICATIONS` listing's records sit under. */
    public const CREDIT_NOTE_APPLICATIONS_KEY = 'data';

    /** The key the `INVOICE_CREDIT_NOTE_APPLICATIONS` listing's records sit under. */
    public const INVOICE_CREDIT_NOTE_APPLICATIONS_KEY = 'data';

    /** The envelope one `credit_note_application` record arrives under. */
    public const CREDIT_NOTE_APPLICATION_KEY = 'credit_note_application';
}
