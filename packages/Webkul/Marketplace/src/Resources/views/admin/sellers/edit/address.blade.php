@php $addresses = explode(PHP_EOL, $seller->address); @endphp

<!-- Address Information -->
<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
        @lang('marketplace::app.admin.sellers.edit.shop.address')
    </p>

    <x-admin::form.control-group.label class="required">
        @lang('marketplace::app.admin.sellers.edit.shop.address')
    </x-admin::form.control-group.label>

    @for ($i = 0; $i < (core()->getConfigData('marketplace.settings.general.lines_in_street_address') ?? 1); $i++)
        <x-admin::form.control-group class="mb-2.5">
            <x-admin::form.control-group.control
                type="text"
                name="address[{{ $i }}]"
                :value="old('address.{{ $i }}') ?: $addresses[$i] ?? ''"
                rules="{{ $i ? '' : 'required' }}"
                :label="trans('marketplace::app.admin.sellers.edit.shop.street-address')"
                :placeholder="trans('marketplace::app.admin.sellers.edit.shop.street-address')"
            />
            
            <x-admin::form.control-group.error control-name="address[{{ $i }}]" />
        </x-admin::form.control-group>
    @endfor

    <div class="flex gap-4 max-sm:flex-wrap">
        <!-- Postcode -->
        <x-admin::form.control-group class="mb-2.5 w-full">
            <x-admin::form.control-group.label class="required">
                @lang('marketplace::app.admin.sellers.edit.shop.postcode')
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="text"
                name="postcode"
                :value="old('postcode') ?: $seller->postcode"
                rules="required"
                :label="trans('marketplace::app.admin.sellers.edit.shop.postcode')"
                :placeholder="trans('marketplace::app.admin.sellers.edit.shop.postcode')"
            />

            <x-admin::form.control-group.error control-name="postcode" />
        </x-admin::form.control-group>

        <!-- City -->
        <x-admin::form.control-group class="mb-2.5 w-full">
            <x-admin::form.control-group.label class="required">
                @lang('marketplace::app.admin.sellers.edit.shop.city')
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="text"
                name="city"
                :value="old('city') ?: $seller->city"
                rules="required"
                :label="trans('marketplace::app.admin.sellers.edit.shop.city')"
                :placeholder="trans('marketplace::app.admin.sellers.edit.shop.city')"
            />

            <x-admin::form.control-group.error control-name="city" />
        </x-admin::form.control-group>
    </div>

    <v-seller-country-state></v-seller-country-state>
</div>

@push('scripts')
    <script
        type="text/x-template"
        id="v-seller-country-state-template"
    >
        <div class="flex gap-4 max-sm:flex-wrap">
            <!-- Country -->
            <x-admin::form.control-group class="w-full">
                <x-admin::form.control-group.label>
                    @lang('marketplace::app.admin.sellers.edit.shop.country')
                </x-admin::form.control-group.label>

                <x-admin::form.control-group.control
                    type="select"
                    name="country"
                    rules="required"
                    ::value="country"
                    v-model="country"
                    :label="trans('marketplace::app.admin.sellers.edit.shop.country')"
                >
                    <option value="">
                        @lang('marketplace::app.admin.sellers.edit.shop.select')
                    </option>

                    @foreach (core()->countries() as $country)
                        <option 
                            {{ $country->code === config('app.default_country') ? 'selected' : '' }}  
                            value="{{ $country->code }}"
                        >
                            {{ $country->name }}
                        </option>
                    @endforeach
                </x-admin::form.control-group.control>

                <x-admin::form.control-group.error control-name="country" />
            </x-admin::form.control-group>

            <!-- State -->
            <x-admin::form.control-group class="w-full">
                <x-admin::form.control-group.label class="required">
                    @lang('marketplace::app.admin.sellers.edit.shop.state')
                </x-admin::form.control-group.label>

                <template v-if="haveStates()">
                    <x-admin::form.control-group.control
                        type="select"
                        id="state"
                        name="state"
                        rules="required"
                        ::value="state"
                        v-model="state"
                        :label="trans('marketplace::app.admin.sellers.edit.shop.state')"
                        :placeholder="trans('marketplace::app.admin.sellers.edit.shop.state')"
                    >
                        <option 
                            v-for='(state, index) in countryStates[country]'
                            :value="state.code"
                            v-text="state.default_name"
                        >
                        </option>
                    </x-admin::form.control-group.control>
                </template>

                <template v-else>
                    <x-admin::form.control-group.control
                        type="text"
                        name="state"
                        v-model="state"
                        rules="required"
                        :label="trans('marketplace::app.admin.sellers.edit.shop.state')"
                        :placeholder="trans('marketplace::app.admin.sellers.edit.shop.state')"
                    />
                </template>

                <x-admin::form.control-group.error control-name="state" />
            </x-admin::form.control-group>
        </div>
    </script>

    <script type="module">
        app.component('v-seller-country-state', {
            template: '#v-seller-country-state-template',

            data() {
                return {
                    country: @json(old('country') ?: $seller->country),

                    state: @json(old('state') ?: $seller->state),

                    countryStates: @json(core()->groupedStatesByCountries()),
                }
            },

            methods: {
                haveStates() {
                    return !!this.countryStates[this.country]?.length;
                },
            },
        });
    </script>
@endpush
