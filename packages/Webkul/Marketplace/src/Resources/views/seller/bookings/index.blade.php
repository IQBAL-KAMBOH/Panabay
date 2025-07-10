<x-marketplace::seller.layouts>
    <x-slot:title>
        @lang('marketplace::app.seller.bookings.index.title')
    </x-slot>
    
    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-marketplace::seller.breadcrumbs name="seller_bookings" />
    @endSection

    {!! view_render_event('bagisto.seller.bookings.list.before') !!}

    <v-booking-products></v-booking-products>

    {!! view_render_event('bagisto.seller.bookings.list.after') !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-booking-products-template"
        >
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <!-- Page Title -->
                <p class="text-2xl font-medium">
                    @lang('marketplace::app.seller.bookings.index.title')
                </p>
        
                <div class="flex items-center gap-2.5">
                    <!-- Export Modal -->
                    <x-marketplace::seller.datagrid.export
                        v-if="viewType == 'table'"
                        src="{{ route('seller.bookings.index') }}" 
                    />
        
                    <!-- View Switcher -->
                    <div class="grid grid-cols-2 border border-gray-300 dark:border-gray-700">
                        <!-- Calendar Icon -->
                        <button
                            class="mp-calendar-icon cursor-pointer p-1.5 text-2xl"
                            :class="{'bg-blue-600 text-white' : viewType === 'calendar'}"
                            @click="viewType = 'calendar'"
                        ></button>
        
                        <!-- List Icon -->
                        <button
                            class="mp-orders-icon cursor-pointer p-1.5 text-2xl"
                            :class="{'bg-blue-600 text-white' : viewType === 'table'}"
                            @click="viewType = 'table'"
                        ></button>
                    </div>
                </div>
            </div>

            <template v-if="viewType == 'table'">
                <x-shop::datagrid :src="route('seller.bookings.index')" />
            </template>

            <template v-else>
                @include('marketplace::seller.bookings.calendar')
            </template>
        </script>

        <script type="module">
            app.component('v-booking-products', {
                template: '#v-booking-products-template',
                
                data() {
                    return {
                        viewType: 'calendar',
                    };
                },
            });
        </script>
    @endPushOnce
</x-marketplace::seller.layouts>
