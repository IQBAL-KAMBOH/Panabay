{!! view_render_event('bagisto.seller.product.edit.booking.rental.before', ['product' => $product]) !!}

<!-- Vue Component -->
<v-rental-booking></v-rental-booking>

{!! view_render_event('bagisto.seller.product.edit.booking.rental.after', ['product' => $product]) !!}

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-rental-booking-template"
    >
        <!-- Renting Type -->
        <x-marketplace::seller.form.control-group class="w-full">
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.rental.title')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="select"
                name="booking[renting_type]"
                rules="required"
                v-model="rental_booking.renting_type"
                :label="trans('marketplace::app.seller.products.edit.types.booking.rental.title')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.rental.title')"
            >
                <option value="daily">
                    @lang('marketplace::app.seller.products.edit.types.booking.rental.daily')
                </option>

                <option value="hourly">
                    @lang('marketplace::app.seller.products.edit.types.booking.rental.hourly')
                </option>

                <option value="daily_hourly">
                    @lang('marketplace::app.seller.products.edit.types.booking.rental.daily-hourly')
                </option>
            </x-marketplace::seller.form.control-group.control>

            <x-marketplace::seller.form.control-group.error control-name="booking[renting_type]" />
        </x-marketplace::seller.form.control-group>

        <!-- Daily Price -->
        <x-marketplace::seller.form.control-group
            class="w-full"
            v-if="rental_booking.renting_type == 'daily' || rental_booking.renting_type == 'daily_hourly'"
        >
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.rental.daily-price')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="text"
                name="booking[daily_price]"
                rules="required"
                v-model="rental_booking.daily_price"
                :label="trans('marketplace::app.seller.products.edit.types.booking.rental.daily-price')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.rental.daily-price')"
            />

            <x-marketplace::seller.form.control-group.error control-name="booking[renting_type]" />
        </x-marketplace::seller.form.control-group>

        <!-- Hourly Price -->
        <x-marketplace::seller.form.control-group
            class="w-full"
            v-if="rental_booking.renting_type == 'hourly' || rental_booking.renting_type == 'daily_hourly'"
        >
            <x-marketplace::seller.form.control-group.label class="required">
                @lang('marketplace::app.seller.products.edit.types.booking.rental.hourly-price')
            </x-marketplace::seller.form.control-group.label>

            <x-marketplace::seller.form.control-group.control
                type="text"
                name="booking[hourly_price]"
                rules="required"
                v-model="rental_booking.hourly_price"
                :label="trans('marketplace::app.seller.products.edit.types.booking.rental.hourly-price')"
                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.rental.hourly-price')"
            />

            <x-marketplace::seller.form.control-group.error control-name="booking[hourly_price]" />
        </x-marketplace::seller.form.control-group>

        <div v-if="rental_booking.renting_type == 'hourly' || rental_booking.renting_type == 'daily_hourly'">
            <!-- Same Slot For All -->
            <x-marketplace::seller.form.control-group class="w-full">
                <x-marketplace::seller.form.control-group.label class="required">
                    @lang('marketplace::app.seller.products.edit.types.booking.rental.same-slot-for-all-days.title')
                </x-marketplace::seller.form.control-group.label>

                <x-marketplace::seller.form.control-group.control
                    type="select"
                    name="booking[same_slot_all_days]"
                    rules="required"
                    v-model="rental_booking.same_slot_all_days"
                    :label="trans('marketplace::app.seller.products.edit.types.booking.rental.same-slot-for-all-days.title')"
                >
                    <option value="1">
                        @lang('marketplace::app.seller.products.edit.types.booking.rental.same-slot-for-all-days.yes')
                    </option>

                    <option value="0">
                        @lang('marketplace::app.seller.products.edit.types.booking.rental.same-slot-for-all-days.no')
                    </option>
                </x-marketplace::seller.form.control-group.control>

                <x-marketplace::seller.form.control-group.error control-name="booking[same_slot_all_days]" />
            </x-marketplace::seller.form.control-group>
        </div>

        <!-- Slots Vue Component -->
        <v-slots
            v-if="rental_booking.renting_type == 'hourly' || rental_booking.renting_type == 'daily_hourly'"
            :booking-product="rental_booking"
            :booking-type="'rental_slot'"
            :same-slot-all-days="rental_booking.same_slot_all_days"
        >
        </v-slots>
    </script>

    <script type="module">
        app.component('v-rental-booking', {
            template: '#v-rental-booking-template',

            props: ['bookingProduct'],

            data() {
                return {
                    rental_booking: @json($bookingProduct && $bookingProduct?->rental_slot) ? @json($bookingProduct?->rental_slot) : {
                        renting_type: 'daily',

                        daily_price: '',

                        hourly_price: '',

                        same_slot_all_days: 1,

                        slots: [],
                    }
                }
            },
        });
    </script>
@endpushOnce