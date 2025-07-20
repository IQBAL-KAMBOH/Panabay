@php
    use Webkul\BookingProduct\Repositories\BookingProductRepository;

    $bookingProduct = app(BookingProductRepository::class)->findOneWhere([
        'product_id' => $product->id,
    ]);
@endphp

{!! view_render_event('bagisto.seller.product.edit.form.types.booking.before', ['product' => $product]) !!}

<!-- Vue Component -->
<v-booking-information></v-booking-information>

{!! view_render_event('bagisto.seller.product.edit.form.types.booking.after', ['product' => $product]) !!}

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-booking-information-template"
    >
        <div class="relative rounded-xl border bg-white p-5">
            <!-- Booking Type -->
            <x-marketplace::seller.form.control-group class="w-full">
                <x-marketplace::seller.form.control-group.label class="required">
                    @lang('marketplace::app.seller.products.edit.types.booking.title')
                </x-marketplace::seller.form.control-group.label>

                <x-marketplace::seller.form.control-group.control
                    class="hidden"
                    name="booking[type]"
                    ::value="booking.type"
                />

                <x-marketplace::seller.form.control-group.control
                    type="select"
                    name="booking[type]"
                    rules="required"
                    ::value="booking.type"
                    v-model="booking.type"
                    :label="trans('marketplace::app.seller.products.edit.types.booking.title')"
                    ::disabled="! is_new"
                >
                    @foreach (['default', 'appointment', 'event', 'rental', 'table'] as $item)
                        <option value={{ $item }}>
                            @lang('marketplace::app.seller.products.edit.types.booking.type.' . $item)
                        </option>
                    @endforeach
                </x-marketplace::seller.form.control-group.control>

                <x-marketplace::seller.form.control-group.error  control-name="booking[type]" />
            </x-marketplace::seller.form.control-group>

            <!-- Location -->
            <x-marketplace::seller.form.control-group class="w-full">
                <x-marketplace::seller.form.control-group.label class="required">
                    @lang('marketplace::app.seller.products.edit.types.booking.location')
                </x-marketplace::seller.form.control-group.label>

                <x-marketplace::seller.form.control-group.control
                    type="text"
                    rules="required"
                    name="booking[location]"
                    v-model="booking.location"
                    :label="trans('marketplace::app.seller.products.edit.types.booking.location')"
                />

                <x-marketplace::seller.form.control-group.error  control-name="booking[location]" />
            </x-marketplace::seller.form.control-group>

            <!-- QTY -->
            <x-marketplace::seller.form.control-group
                class="w-full"
                v-if="booking.type == 'default'
                    || booking.type == 'appointment'
                    || booking.type == 'rental'"
            >
                <x-marketplace::seller.form.control-group.label class="required">
                    @lang('marketplace::app.seller.products.edit.types.booking.qty')
                </x-marketplace::seller.form.control-group.label>

                <x-marketplace::seller.form.control-group.control
                    type="text"
                    name="booking[qty]"
                    rules="required|numeric|min:0"
                    v-model="booking.qty"
                    :label="trans('marketplace::app.seller.products.edit.types.booking.qty')"
                />

                <x-marketplace::seller.form.control-group.error  control-name="booking[qty]" />
            </x-marketplace::seller.form.control-group>

            <!-- Available Every Week -->
            <x-marketplace::seller.form.control-group
                class="w-full"
                v-if="booking.type != 'event' && booking.type != 'default'"
            >
                <x-marketplace::seller.form.control-group.label class="required">
                    @lang('marketplace::app.seller.products.edit.types.booking.available-every-week.title')
                </x-marketplace::seller.form.control-group.label>

                <x-marketplace::seller.form.control-group.control
                    type="select"
                    name="booking[available_every_week]"
                    rules="required"
                    v-model="booking.available_every_week"
                    :label="trans('marketplace::app.seller.products.edit.types.booking.available-every-week.title')"
                    @change="booking.availableEveryWeekSwatch= ! booking.availableEveryWeekSwatch"
                >
                    <option value="1">
                        @lang('marketplace::app.seller.products.edit.types.booking.available-every-week.yes')
                    </option>

                    <option value="0">
                        @lang('marketplace::app.seller.products.edit.types.booking.available-every-week.no')
                    </option>
                </x-marketplace::seller.form.control-group.control>

                <x-marketplace::seller.form.control-group.error  control-name="booking[available_every_week]" />
            </x-marketplace::seller.form.control-group>

            <div
                class="flex gap-2.5"
                v-if="! parseInt(booking.available_every_week)"
            >
                <!-- Available From  -->
                <x-marketplace::seller.form.control-group class="w-full">
                    <x-marketplace::seller.form.control-group.label class="required">
                        @lang('marketplace::app.seller.products.edit.types.booking.available-from')
                    </x-marketplace::seller.form.control-group.label>

                    @php
                        $dateMin = \Carbon\Carbon::yesterday()->format('Y-m-d 23:59:59');
                    @endphp

                    <x-marketplace::seller.form.control-group.control
                        type="datetime"
                        name="booking[available_from]"
                        :rules="'required|after:' . $dateMin"
                        v-model="booking.available_from"
                        :label="trans('marketplace::app.seller.products.edit.types.booking.available-from')"
                        :placeholder="trans('marketplace::app.seller.products.edit.types.booking.available-from')"
                    />

                    <x-marketplace::seller.form.control-group.error  control-name="booking[available_from]" />
                </x-marketplace::seller.form.control-group>

                <!-- Available To -->
                <x-marketplace::seller.form.control-group class="w-full">
                    <x-marketplace::seller.form.control-group.label class="required">
                        @lang('marketplace::app.seller.products.edit.types.booking.available-to')
                    </x-marketplace::seller.form.control-group.label>

                    <x-marketplace::seller.form.control-group.control
                        type="datetime"
                        name="booking[available_to]"
                        ::rules="'required|after:' + booking.available_from"
                        v-model="booking.available_to"
                        :label="trans('marketplace::app.seller.products.edit.types.booking.available-to')"
                        :placeholder="trans('marketplace::app.seller.products.edit.types.booking.available-to')"
                    />

                    <x-marketplace::seller.form.control-group.error  control-name="booking[available_to]" />
                </x-marketplace::seller.form.control-group>
            </div>

            @php
                $bookingTypes = [
                    'default',
                    'appointment',
                    'event',
                    'rental',
                    'table'
                ];
            @endphp

            @foreach ($bookingTypes as $type)
                <template v-if="booking.type === '{{ $type }}'">
                    @include('marketplace::seller.products.edit.types.booking.' . $type, ['bookingProduct' => $bookingProduct])
                </template>
            @endforeach
        </div>
    </script>

    <script type="module">
        defineRule('required_if', (value, { condition = true } = {}) => {
            if (condition) {
                if (
                    value === null
                    || value === undefined
                    || value === ''
                ) {
                    return false;
                }
            }

            return true;
        });

        defineRule('after', (value, [target]) => {
            if (! value || ! target) {
                return false;
            }

            return new Date(value) > new Date(target);
        });

        app.component('v-booking-information', {
            template: '#v-booking-information-template',

            data() {
                return {
                    is_new: @json($bookingProduct) ? false : true,

                    booking: @json($bookingProduct) ? @json($bookingProduct) : {

                        type: 'default',

                        location: '',

                        qty: 0,

                        available_every_week: 0,

                        availableEveryWeekSwatch: true,

                        available_from: '',

                        available_to: ''
                    }
                }
            },

            created() {
                this.booking.available_from = "{{ $bookingProduct && $bookingProduct->available_from ? $bookingProduct->available_from->format('Y-m-d H:i:s') : '' }}";

                this.booking.available_to = "{{ $bookingProduct && $bookingProduct->available_to ? $bookingProduct->available_to->format('Y-m-d H:i:s') : '' }}";
            }
        });
    </script>

    <!-- Slots component Included -->
    @include('marketplace::seller.products.edit.types.booking.slots')

    <!-- Empty Info Page Included -->
    @include('marketplace::seller.products.edit.types.booking.empty-info')
@endpushOnce
