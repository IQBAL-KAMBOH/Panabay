{!! view_render_event('marketplace.admin.seller.edit.card.meta_info.before', ['seller' => $seller]) !!}
<!-- Meta Information -->
<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
        @lang('marketplace::app.admin.sellers.edit.meta-info.title')
    </p>
    
    <x-admin::seo />

    <x-admin::form.control-group class="mb-2.5">
        <x-admin::form.control-group.label>
            @lang('marketplace::app.admin.sellers.edit.meta-info.meta-title')
        </x-admin::form.control-group.label>

        <x-admin::form.control-group.control
            type="textarea"
            name="meta_title"
            id="meta_title"
            :value="old('meta_title') ?: $seller->meta_title"
            :label="trans('marketplace::app.admin.sellers.edit.meta-info.meta-title')"
            :placeholder="trans('marketplace::app.admin.sellers.edit.meta-info.meta-title')"
        />

        <x-admin::form.control-group.error control-name="meta_title" />
    </x-admin::form.control-group>

    <x-admin::form.control-group class="mb-2.5">
        <x-admin::form.control-group.label>
            @lang('marketplace::app.admin.sellers.edit.meta-info.meta-keyword')
        </x-admin::form.control-group.label>

        <x-admin::form.control-group.control
            type="textarea"
            name="meta_keywords"
            id="meta_keywords"
            :value="old('meta_keywords') ?: $seller->meta_keywords"
            :label="trans('marketplace::app.admin.sellers.edit.meta-info.meta-keyword')"
            :placeholder="trans('marketplace::app.admin.sellers.edit.meta-info.meta-keyword')"
        />

        <x-admin::form.control-group.error control-name="meta_keywords" />
    </x-admin::form.control-group>

    <x-admin::form.control-group class="mb-2.5">
        <x-admin::form.control-group.label>
            @lang('marketplace::app.admin.sellers.edit.meta-info.meta-description')
        </x-admin::form.control-group.label>

        <x-admin::form.control-group.control
            type="textarea"
            name="meta_description"
            id="meta_description"
            :value="old('meta_description') ?: $seller->meta_description"
            :label="trans('marketplace::app.admin.sellers.edit.meta-info.meta-description')"
            :placeholder="trans('marketplace::app.admin.sellers.edit.meta-info.meta-description')"
        />

        <x-admin::form.control-group.error control-name="meta_description" />
    </x-admin::form.control-group>
</div>

{!! view_render_event('marketplace.admin.seller.edit.card.meta_info.after', ['seller' => $seller]) !!}
