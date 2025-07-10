<x-marketplace::seller.layouts>
    <x-slot:title>
        @lang('marketplace::app.seller.settings.inventory-sources.index.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-marketplace::seller.breadcrumbs name="inventory_sources" />
    @endSection

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-2xl font-medium">
            @lang('marketplace::app.seller.settings.inventory-sources.index.title')
        </p>

        <!-- Create Button -->
        @if (seller()->hasPermission('settings.inventory_sources.create'))
            <a
                class="primary-button px-5 py-2.5"
                href="{{ route('seller.settings.inventory_sources.create') }}"
            >
                @lang('marketplace::app.seller.settings.inventory-sources.index.create-btn')
            </a>
        @endif
    </div>

    {!! view_render_event('bagisto.seller.settings.inventory_sources.list.before') !!}

    <x-admin::datagrid :src="route('seller.settings.inventory_sources.index')" />

    {!! view_render_event('bagisto.seller.settings.inventory_sources.list.after') !!}

</x-marketplace::seller.layouts>
