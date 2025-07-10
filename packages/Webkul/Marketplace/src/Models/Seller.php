<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Webkul\Core\Models\ChannelProxy;
use Webkul\Inventory\Models\InventorySourceProxy;
use Webkul\Marketplace\Contracts\Seller as SellerContract;
use Webkul\Marketplace\Database\Factories\SellerFactory;
use Webkul\Marketplace\Mail\ResetPasswordNotification;

class Seller extends Authenticatable implements SellerContract
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marketplace_sellers';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        '_token',
        'logo',
        'banner',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'allowed_product_types' => 'array',
        'password'              => 'hashed',
    ];

    /**
     * Append to the model attributes
     *
     * @var array
     */
    protected $appends = [
        'logo_url',
        'banner_url',
    ];

    /**
     * Get logo image url attribute.
     */
    public function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->logo ? Storage::url($this->logo) : null,
        );
    }

    /**
     * Get banner image url attribute.
     */
    public function bannerUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->banner ? Storage::url($this->banner) : null,
        );
    }

    /**
     * Get the seller's full address attribute.
     */
    public function fullAddress(): Attribute
    {
        $addressParts = array_filter([
            implode(', ', array_filter(explode(PHP_EOL, $this->address))),
            $this->city,
            $this->state,
            $this->postcode,
            $this->country ? "({$this->country})" : null,
        ]);

        return Attribute::make(
            get: fn () => implode(', ', $addressParts),
        );
    }

    /**
     * Get the sellers's products.
     */
    public function products(): HasMany
    {
        return $this->hasMany(ProductProxy::modelClass(), 'marketplace_seller_id');
    }

    /**
     * Get the seller's reviews.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ReviewProxy::modelClass(), 'marketplace_seller_id');
    }

    /**
     * Get the product's reviews.
     */
    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReviewProxy::modelClass(), 'marketplace_seller_id');
    }

    /**
     * Get the seller's orders.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(OrderProxy::modelClass(), 'marketplace_seller_id');
    }

    /**
     * Get the seller's category.
     */
    public function category(): HasOne
    {
        return $this->hasOne(SellerCategoryProxy::modelClass(), 'marketplace_seller_id');
    }

    /**
     * Get the seller's shipping.
     */
    public function flags(): HasMany
    {
        return $this->hasMany(SellerFlagProxy::modelClass(), 'marketplace_seller_id');
    }

    /**
     * Show red flag.
     */
    public function showRedFlag(): bool
    {
        return core()->getConfigData('marketplace.settings.seller.show_red_flag')
            && ($this->flags()->count() > core()->getConfigData('marketplace.settings.seller.red_flag_limit'));
    }

    /*
     * Get the parent seller
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Get the seller's children.
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * Get the seller's role.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(RoleProxy::modelClass(), 'marketplace_role_id');
    }

    /**
     * Get the seller's communication.
     */
    public function communication(): HasOne
    {
        return $this->hasOne(CommunicationProxy::modelClass(), 'marketplace_seller_id');
    }

    /**
     * Get the seller's channels.
     */
    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(ChannelProxy::modelClass());
    }

    /**
     * Get the seller's inventory sources.
     */
    public function inventory_sources(): HasMany
    {
        return $this->hasMany(InventorySourceProxy::modelClass(), 'vendor_id');
    }

    /**
     * Checks if seller has permission to perform certain action.
     */
    public function hasPermission(string $permission): bool
    {
        if (
            $this->role->permission_type == 'custom'
            && ! $this->role->permissions
        ) {
            return false;
        }

        return in_array($permission, $this->role->permissions);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get the factory instance.
     */
    protected static function newFactory(): SellerFactory
    {
        return SellerFactory::new();
    }

    /**
     * Boot method to add event listener.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::saving(function ($seller) {
            $requiredFields = [
                'name',
                'email',
                'url',
                'phone',
                'address',
                'city',
                'state',
                'postcode',
                'country',
                'shop_title',
                'description',
            ];

            $isComplete = collect($requiredFields)->every(fn ($field) => ! empty($seller->$field));

            $seller->is_profile_completed = $isComplete ? 1 : 0;
        });
    }

    /**
     * Get the seller's profile score.
     */
    public function getProfileScoreAttribute(): int
    {
        $attributes = $this->getAttributes();

        $skippableAttributes = [
            'id',
            'password',
            'is_approved',
            'marketplace_role_id',
            'parent_id',
            'is_suspended',
            'is_profile_completed',
            'commission_enable',
            'commission_percentage',
            'allowed_product_types',
            'enable_minimum_order_amount',
            'locale',
            'created_at',
            'updated_at',
        ];

        if (! core()->getConfigData('marketplace.settings.seller.enable_minimum_order_amount')) {
            $skippableAttributes[] = 'minimum_order_amount';
        }

        $attributes = Arr::except($attributes, $skippableAttributes);

        $totalFields = count($attributes);
        $filledFields = count(Arr::where($attributes, fn ($value) => ! empty($value)));

        $score = $totalFields > 0 ? ($filledFields / $totalFields) * 100 : 0;

        return round($score);
    }
}
