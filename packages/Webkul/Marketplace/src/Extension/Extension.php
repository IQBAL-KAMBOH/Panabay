<?php

namespace Webkul\Marketplace\Extension;

use Webkul\Marketplace\Enums\ExtensionTag;

abstract class Extension
{
    /**
     * Check if the extension is enabled.
     */
    abstract public function isEnabled(): bool;

    /**
     * Get the extension tag (e.g., payment, shipping).
     */
    abstract public function getTag(): ExtensionTag;

    /**
     * Get the extension title.
     */
    abstract public function getTitle(): string;

    /**
     * Get the extension description.
     */
    abstract public function getDescription(): string;

    /**
     * Get the extension image URL or path.
     */
    abstract public function getImageUrl(): string;

    /**
     * Get the redirect URL for the extension settings or documentation.
     */
    abstract public function getRedirectUrl(): string;
}
