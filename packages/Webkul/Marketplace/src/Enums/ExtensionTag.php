<?php

namespace Webkul\Marketplace\Enums;

enum ExtensionTag: string
{
    case BULK_UPLOAD = 'bulk_upload';
    case GDPR = 'gdpr';
    case MARKETPLACE = 'marketplace';
    case PAYMENT = 'payment';
    case POS = 'pos';
    case SHIPPING = 'shipping';

    /**
     * Get the values of the enum.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
