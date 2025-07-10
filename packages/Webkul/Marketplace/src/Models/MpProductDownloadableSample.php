<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Marketplace\Contracts\MpProductDownloadableSample as ProductDownloadableSampleContract;

class MpProductDownloadableSample extends TranslatableModel implements ProductDownloadableSampleContract
{
    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['title'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mp_product_downloadable_samples';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'url',
        'file',
        'file_name',
        'type',
        'sort_order',
        'product_id',
    ];

    /**
     * With the translations given attributes
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * Get the product that owns the image.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductProxy::modelClass());
    }

    /**
     * Get image url for the file.
     */
    public function fileUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->path ? Storage::url($this->path) : null,
        );
    }

    /**
     * Return the array representation of the model.
     */
    public function toArray(): array
    {
        $array = parent::toArray();

        $translation = $this->translate(core()->getRequestedLocaleCode());

        $array['title'] = $translation ? $translation->title : '';

        $array['file_url'] = $this->file_url;

        return $array;
    }
}
