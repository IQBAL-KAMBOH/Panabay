{!! view_render_event('bagisto.seller.product.edit.booking.table.before', ['product' => $product]) !!}

<!-- Vue Component -->
<v-table-booking></v-table-booking>

{!! view_render_event('bagisto.seller.product.edit.booking.table.after', ['product' => $product]) !!}

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-table-booking-template"
    >
        <!-- Charged Per -->
        <x-marketplace::seller.form.control-group class="w-full">
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.table.charged-per.title')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="select"
                name="booking[price_type]"
                rules="required"
                v-model="table_booking.price_type"
                :label="trans('marketplace::app.seller.products.edit.types.booking.charged-per.title')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.charged-per.title')"
            >
                @foreach (['guest', 'table'] as $item)
                    <option value="{{ $item }}">
                        @lang('marketplace::app.seller.products.edit.types.booking.table.charged-per.' . $item)
                    </option>
                @endforeach
            </x-marketplace::seller.form.control-group.control>

            <x-marketplace::seller.form.control-group.error control-name="booking[price_type]" />
        </x-marketplace::seller.form.control-group>

        <!-- Guest Limit -->
        <x-marketplace::seller.form.control-group
            class="w-full"
            v-if="table_booking.price_type == 'table'"
        >
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.table.guest-limit')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="text"
                name="booking[guest_limit]"
                rules="required|min_value:1"
                v-model="table_booking.guest_limit"
                :label="trans('marketplace::app.seller.products.edit.types.booking.table.guest-limit')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.table.guest-limit')"
            />

            <x-marketplace::seller.form.control-group.error  control-name="booking[guest_limit]" />
        </x-marketplace::seller.form.control-group>

        <!-- Guest Capacity -->
        <x-marketplace::seller.form.control-group class="w-full">
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.table.guest-capacity')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="text"
                name="booking[qty]"
                value="{{ $bookingProduct ? $bookingProduct->qty : 0 }}"
                rules="required|min_value:1"
                :label="trans('marketplace::app.seller.products.edit.types.booking.table.guest-capacity')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.table.guest-capacity')"
            />

            <x-marketplace::seller.form.control-group.error control-name="booking[qty]" />
        </x-marketplace::seller.form.control-group>

        <!-- Slot Duration -->
        <x-marketplace::seller.form.control-group class="w-full">
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.table.slot-duration')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="text"
                name="booking[duration]"
                rules="required|min_value:1"
                v-model="table_booking.duration"
                :label="trans('marketplace::app.seller.products.edit.types.booking.table.slot-duration')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.table.slot-duration')"
            />

            <x-marketplace::seller.form.control-group.error control-name="booking[duration]" />
        </x-marketplace::seller.form.control-group>

        <!-- Break Time -->
        <x-marketplace::seller.form.control-group class="w-full">
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.table.break-duration')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="text"
                name="booking[break_time]"
                rules="required|min_value:1"
                v-model="table_booking.break_time"
                :label="trans('marketplace::app.seller.products.edit.types.booking.table.break-duration')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.table.break-duration')"
            />

            <x-marketplace::seller.form.control-group.error control-name="booking[break_time]" />
        </x-marketplace::seller.form.control-group>

        <!-- Prevent Scheduling Before -->
        <x-marketplace::seller.form.control-group class="w-full">
            <x-marketplace::seller.form.control-group.label>
                @lang('marketplace::app.seller.products.edit.types.booking.table.prevent-scheduling-before')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="text"
                name="booking[prevent_scheduling_before]"
                v-model="table_booking.prevent_scheduling_before"
                :label="trans('marketplace::app.seller.products.edit.types.booking.table.prevent-scheduling-before')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.table.prevent-scheduling-before')"
            />

            <x-marketplace::seller.form.control-group.error control-name="booking[prevent_scheduling_before]" />
        </x-marketplace::seller.form.control-group>

        <!-- Same slot all days -->
        <x-marketplace::seller.form.control-group class="w-full">
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.table.same-slot-for-all-days.title')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="select"
                name="booking[same_slot_all_days]`"
                rules="required"
                v-model="table_booking.same_slot_all_days"
                :label="trans('marketplace::app.seller.products.edit.types.booking.table.same-slot-for-all-days.title')"
            >
                <option value="1">
                    @lang('marketplace::app.seller.products.edit.types.booking.table.same-slot-for-all-days.yes')
                </option>

                <option value="0">
                    @lang('marketplace::app.seller.products.edit.types.booking.table.same-slot-for-all-days.no')
                </option>
            </x-marketplace::seller.form.control-group.control>

            <x-marketplace::seller.form.control-group.error control-name="booking[same_slot_all_days]`" />
        </x-marketplace::seller.form.control-group>

        <!-- Slots Vue Component -->
        <v-slots
            :booking-product="table_booking"
            :booking-type="'table_slot'"
            :same-slot-all-days="table_booking.same_slot_all_days"
        >
        </v-slots>
    </script>

    <script type="module">
        app.component('v-table-booking', {
            template: '#v-table-booking-template',

            props: ['bookingProduct'],

            data() {
                return {
                    table_booking: @json($bookingProduct && $bookingProduct?->table_slot) ? @json($bookingProduct?->table_slot) : {
                        price_type: 'guest',

                        guest_limit: 2,

                        duration: 45,

                        break_time: 15,

                        prevent_scheduling_before: 0,

                        same_slot_all_days: 1,

                        slots: []
                    }
                }
            },
        });
    </script>
@endpushOnce