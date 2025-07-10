<?php

namespace Webkul\Marketplace;

class Seller
{
    /**
     * Checks if seller allowed or not for certain action
     */
    public function hasPermission(string $permission, $guard = 'seller'): bool
    {
        $seller = auth()->guard($guard);

        if (! $seller->check()) {
            return false;
        }

        $user = $seller->user();

        if (is_null($user->parent_id)) {
            return true;
        }

        if ($user->role->permission_type === 'all') {
            return in_array($permission, array_column(config('marketplace_acl'), 'key'));
        }

        return $user->hasPermission($permission);
    }

    /**
     * Checks if user allowed or not for certain action
     */
    public static function allow(string $permission, $guard = 'seller'): void
    {
        if (
            ! auth()->guard($guard)->check()
            || ! auth()->guard($guard)->user()->hasPermission($permission)
        ) {
            abort(401, 'This action is unauthorized');
        }
    }

    /**
     * Get the authenticated seller or their parent if available.
     */
    public static function user($guard = 'seller'): ?\Webkul\Marketplace\Contracts\Seller
    {
        $seller = auth()->guard($guard)->user();

        if ($seller?->parent_id) {
            return $seller->parent;
        }

        return $seller;
    }

    /**
     * Return the ID of the current authenticated seller or parent.
     */
    public static function id($guard = 'seller'): ?int
    {
        return static::user($guard)?->id;
    }

    /**
     * Magic getter to allow property-like access.
     */
    public function __get($name): mixed
    {
        return self::user()?->$name;
    }
}
