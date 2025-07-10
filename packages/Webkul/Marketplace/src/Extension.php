<?php

namespace Webkul\Marketplace;

use Illuminate\Support\Facades\Config;
use Webkul\Marketplace\Enums\ExtensionTag;

class Extension
{
    /**
     * Returns list of all available extensions.
     */
    public function getAvailableExtensions(): array
    {
        $extensions = [];

        foreach (Config::get('marketplace_extensions', []) as $extensionConfig) {
            $extension = app($extensionConfig['class']);

            $extensions[] = [
                'enabled'      => $extension->isEnabled(),
                'tag'          => $extension->getTag(),
                'title'        => $extension->getTitle(),
                'description'  => $extension->getDescription(),
                'image_url'    => $extension->getImageUrl(),
                'redirect_url' => $extension->getRedirectUrl(),
                'sort'         => $extensionConfig['sort'] ?? 0,
            ];
        }

        return collect($extensions)->sortBy('sort')->toArray();
    }

    /**
     * Returns list of all tags.
     */
    public function getAllTags(): array
    {
        return ExtensionTag::values();
    }
}
