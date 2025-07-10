<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Webkul\Marketplace\Contracts\ProductVideo as ProductVideoContract;

class ProductVideo extends Model implements ProductVideoContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marketplace_product_videos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'type',
        'path',
        'marketplace_product_id',
        'position',
    ];

    /**
     * Get the product that owns the image.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductProxy::modelClass());
    }

    /**
     * Get video url for the product video.
     */
    public function url(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::url($this->path)
        );
    }

    /**
     * Check if the attribute is a custom attribute.
     */
    public function isCustomAttribute(string $attribute): bool
    {
        return $this->attribute_family->custom_attributes->pluck('code')->contains($attribute);
    }

    /**
     * Returns the array representation of the model.
     */
    public function toArray(): array
    {
        $array = parent::toArray();

        $array['url'] = $this->url;

        return $array;
    }
}
