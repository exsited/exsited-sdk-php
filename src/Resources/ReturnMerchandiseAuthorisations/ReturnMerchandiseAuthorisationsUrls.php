<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations;

final class ReturnMerchandiseAuthorisationsUrls
{
    public const RETURN_MERCHANDISE_AUTHORISATIONS = '/api/{api_version}/return_merchandise_authorisations';
    public const RETURN_MERCHANDISE_AUTHORISATION = '/api/{api_version}/return_merchandise_authorisations/{rma_id}';
    public const INVOICE_RETURN_MERCHANDISE_AUTHORISATION_RECEIVE = '/api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations/{rma_code}/receive';
    public const INVOICE_RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_BY_UUID = '/api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations/{rma_code}/receive/{receive_uuid}';
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTES = '/api/{api_version}/return_merchandise_authorisations/{rma_id}/notes';
    public const RETURN_MERCHANDISE_AUTHORISATION_RECEIVE = '/api/{api_version}/return_merchandise_authorisations/{rma_id}/receive';
    public const RETURN_MERCHANDISE_AUTHORISATION_APPROVE = '/api/{api_version}/return_merchandise_authorisations/{rma_id}/approve';
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTE = '/api/{api_version}/return_merchandise_authorisations/{rma_id}/notes/{note_id}';
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTE_FILE = '/api/{api_version}/return_merchandise_authorisations/{rma_id}/notes/{note_id}/files/{file_id}';
    public const RETURN_MERCHANDISE_AUTHORISATION_REJECT = '/api/{api_version}/return_merchandise_authorisations/{rma_id}/reject';
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTES_BY_CODE = '/api/{api_version}/return_merchandise_authorisations/{rma_code}/notes';
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTE_BY_CODE = '/api/{api_version}/return_merchandise_authorisations/{rma_code}/notes/{note_id}';
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTE_FILES_BY_CODE = '/api/{api_version}/return_merchandise_authorisations/{rma_code}/notes/{note_id}/files';
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTE_FILE_BY_CODE = '/api/{api_version}/return_merchandise_authorisations/{rma_code}/notes/{note_id}/files/{file_id}';
    public const RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_BY_CODE = '/api/{api_version}/return_merchandise_authorisations/{rma_code}/receive';
    public const RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_BY_UUID = '/api/{api_version}/return_merchandise_authorisations/{rma_code}/receive/{receive_uuid}';

    /** The key the `INVOICE_RETURN_MERCHANDISE_AUTHORISATION_RECEIVE` listing's records sit under. */
    public const INVOICE_RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_KEY = 'receive_return_merchandise_authorisations';

    /** The key the `RETURN_MERCHANDISE_AUTHORISATIONS` listing's records sit under. */
    public const RETURN_MERCHANDISE_AUTHORISATIONS_KEY = 'data';

    /** The envelope one `invoice` record arrives under. */
    public const INVOICE_KEY = 'invoice';

    /** The envelope one `receive_return_merchandise_authorisation` record arrives under. */
    public const RECEIVE_RETURN_MERCHANDISE_AUTHORISATION_KEY = 'receive_return_merchandise_authorisation';

    /** The envelope one `return_merchandise_authorisation` record arrives under. */
    public const RETURN_MERCHANDISE_AUTHORISATION_KEY = 'return_merchandise_authorisation';

    /** The key the `RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_BY_CODE` listing's records sit under. */
    public const RETURN_MERCHANDISE_AUTHORISATION_RECEIVE_BY_CODE_KEY = 'data';

    /** The key the `RETURN_MERCHANDISE_AUTHORISATION_NOTES_BY_CODE` listing's records sit under. */
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTES_BY_CODE_KEY = 'data';

    /** The key the `RETURN_MERCHANDISE_AUTHORISATION_NOTE_FILES_BY_CODE` listing's records sit under. */
    public const RETURN_MERCHANDISE_AUTHORISATION_NOTE_FILES_BY_CODE_KEY = 'data';

    /** The envelope one `receive_rma` record arrives under. */
    public const RECEIVE_RMA_KEY = 'receive_rma';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';

    /** The envelope one `file` record arrives under. */
    public const FILE_KEY = 'file';
}
