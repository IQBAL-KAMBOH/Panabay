{!! view_render_event('marketplace.admin.seller.edit.card.policy.before', ['seller' => $seller]) !!}

<!-- Policy -->
<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
        @lang('marketplace::app.admin.sellers.edit.policy.title')
    </p>

    <x-admin::form.control-group class="mb-2.5">
        <x-admin::form.control-group.label>
            @lang('marketplace::app.admin.sellers.edit.policy.privacy')
        </x-admin::form.control-group.label>

        <x-admin::form.control-group.control
            type="textarea"
            name="privacy_policy"
            id="privacy_policy"
            :value="old('privacy_policy') ?: $seller->privacy_policy"
            :label="trans('marketplace::app.admin.sellers.edit.policy.privacy')"
            :placeholder="trans('marketplace::app.admin.sellers.edit.policy.privacy')"
            :tinymce="true"
        />

        <x-admin::form.control-group.error control-name="privacy_policy" />
    </x-admin::form.control-group>

    <x-admin::form.control-group class="mb-2.5">
        <x-admin::form.control-group.label>
            @lang('marketplace::app.admin.sellers.edit.policy.shipping')
        </x-admin::form.control-group.label>

        <x-admin::form.control-group.control
            type="textarea"
            name="shipping_policy"
            id="shipping_policy"
            :value="old('privacy_policy') ?: $seller->privacy_policy"
            :label="trans('marketplace::app.admin.sellers.edit.policy.shipping')"
            :placeholder="trans('marketplace::app.admin.sellers.edit.policy.shipping')"
            :tinymce="true"
        />

        <x-admin::form.control-group.error control-name="shipping_policy" />
    </x-admin::form.control-group>

    <x-admin::form.control-group class="mb-2.5">
        <x-admin::form.control-group.label>
            @lang('marketplace::app.admin.sellers.edit.policy.return')
        </x-admin::form.control-group.label>

        <x-admin::form.control-group.control
            type="textarea"
            name="return_policy"
            id="return_policy"
            :value="old('return_policy') ?: $seller->return_policy"
            :label="trans('marketplace::app.admin.sellers.edit.policy.return')"
            :placeholder="trans('marketplace::app.admin.sellers.edit.policy.return')"
            :tinymce="true"
        />

        <x-admin::form.control-group.error control-name="return_policy" />
    </x-admin::form.control-group>
</div>

{!! view_render_event('marketplace.admin.seller.edit.card.policy.after', ['seller' => $seller]) !!}
