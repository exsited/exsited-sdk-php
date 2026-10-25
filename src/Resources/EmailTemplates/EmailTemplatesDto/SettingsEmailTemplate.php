<?php

declare(strict_types=1);

namespace Exsited\Resources\EmailTemplates\EmailTemplatesDto;

use Exsited\Client\Dto;

/** The settings email template body, under `email_template`. */
final class SettingsEmailTemplate extends Dto
{
    public const ENVELOPE_KEY = 'email_template';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/email_templates',
        'GET /api/{api_version}/settings/email_templates/{email_template_id}',
        'POST /api/{api_version}/settings/email_templates',
        'PATCH /api/{api_version}/settings/email_templates/{email_template_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $entity = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isEdited = null,
        public readonly ?bool $isSystemTemplate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $replyAddress = null,
        public readonly ?bool $richEditor = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $senderAddress = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $senderName = null,
        public readonly ?string $status = null,
        public readonly ?string $subject = null,
        public readonly ?bool $trackEmailOpen = null,
        public readonly ?bool $trackLinkClick = null,
    ) {
    }
}
