<?php

namespace Webkul\Marketplace\Http\Requests;

use Webkul\Admin\Http\Requests\InventorySourceRequest as FormRequest;

class InventorySourceRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->status ?? 0,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'description' => 'nullable|string',
            'contact_fax' => 'nullable|string',
            'status'      => 'boolean',
        ]);
    }
}
