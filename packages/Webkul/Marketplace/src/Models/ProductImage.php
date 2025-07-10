<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Webkul\Marketplace\Contracts\ProductImage as ProductImageContract;

class ProductImage extends Model implements ProductImageContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marketplace_product_images';

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
        return $this->belongsTo(ProductProxy::modelClass(), 'marketplace_product_id');
    }

    /**
     * Get image url for the product image.
     */
    public function url(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::url($this->path)
        );
    }

    /**
     * Return the array representation of the model.
     */
    public function toArray(): array
    {
        $array = parent::toArray();

        $array['url'] = $this->url;

        return $array;
    }
}
