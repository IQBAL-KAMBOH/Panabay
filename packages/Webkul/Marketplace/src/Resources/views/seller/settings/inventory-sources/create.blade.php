<x-marketplace::seller.layouts>
    <x-slot:title>
        @lang('marketplace::app.seller.settings.inventory-sources.create.add-title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-marketplace::seller.breadcrumbs name="inventory_sources.create" />
    @endSection

    {!! view_render_event('bagisto.seller.settings.inventory_sources.create.before') !!}

    <x-marketplace::seller.form :action="route('seller.settings.inventory_sources.store')">
        {!! view_render_event('bagisto.seller.settings.inventory_sources.create.create_form_controls.before') !!}

        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-2xl font-medium">
                @lang('marketplace::app.seller.settings.inventory-sources.create.add-title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <!-- Back Button -->
                <a
                    href="{{ route('seller.settings.inventory_sources.index') }}"
                    class="transparent-button font-semibold"
                >
                    @lang('marketplace::app.seller.settings.inventory-sources.create.back-btn')
                </a>
                    
                <!-- Save Inventory -->
                <button 
                    type="submit"
                    class="primary-button px-5 py-2.5"
                >
                    @lang('marketplace::app.seller.settings.inventory-sources.create.save-btn')
                </button>
            </div>
        </div>
    
        <!-- Full Panel -->
        <div class="mt-3.5 flex gap-6 max-xl:flex-wrap">
            <!-- Left Section -->
            <div class="flex flex-1 flex-col gap-6 max-xl:flex-auto">

                {!! view_render_event('bagisto.seller.settings.inventory_sources.create.card.general.before') !!}

                <!-- General -->
                <div class="rounded-xl border bg-white p-5">
                    <p class="mb-4 text-base font-semibold text-gray-800">
                        @lang('marketplace::app.seller.settings.inventory-sources.create.general')
                    </p>

                    <!-- Code -->
                    <x-marketplace::seller.form.control-group>
                        <x-marketplace::seller.form.control-group.label class="required">
                            @lang('marketplace::app.seller.settings.inventory-sources.create.code')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="code"
                            name="code"
                            rules="required"
                            :value="old('code')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.code')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="code" />
                    </x-marketplace::seller.form.control-group>

                    <!-- Name -->
                    <x-marketplace::seller.form.control-group>
                        <x-marketplace::seller.form.control-group.label class="required">
                            @lang('marketplace::app.seller.settings.inventory-sources.create.name')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="name"
                            name="name"
                            rules="required"
                            :value="old('name')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.name')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="name" />
                    </x-marketplace::seller.form.control-group>

                    <!-- Description -->
                    <x-marketplace::seller.form.control-group class="!mb-0">
                        <x-marketplace::seller.form.control-group.label>
                            @lang('marketplace::app.seller.settings.inventory-sources.create.description')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="textarea"
                            id="description"
                            name="description"
                            :value="old('description')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.description')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="description" />
                    </x-marketplace::seller.form.control-group>
                </div>

                {!! view_render_event('bagisto.seller.settings.inventory_sources.create.card.general.after') !!}

                {!! view_render_event('bagisto.seller.settings.inventory_sources.create.card.address.before') !!}

                <!-- Source Address -->
                <v-source-address></v-source-address>

                {!! view_render_event('bagisto.seller.settings.inventory_sources.create.card.address.after') !!}

            </div>

            <!-- Right Section -->
            <div class="flex w-[360px] max-w-full flex-col gap-6">

                {!! view_render_event('bagisto.seller.settings.inventory_sources.create.card.settings.before') !!}

                <!-- Settings -->
                <div class="rounded-xl border bg-white p-5">
                    <p class="mb-4 text-base font-semibold text-gray-800">
                        @lang('marketplace::app.seller.settings.inventory-sources.create.settings')
                    </p>

                    <!-- Latitude -->
                    <x-marketplace::seller.form.control-group>
                        <x-marketplace::seller.form.control-group.label>
                            @lang('marketplace::app.seller.settings.inventory-sources.create.latitude')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="latitude"
                            name="latitude"
                            :value="old('latitude')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.latitude')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="latitude" />
                    </x-marketplace::seller.form.control-group>

                    <!-- Longitude -->
                    <x-marketplace::seller.form.control-group>
                        <x-marketplace::seller.form.control-group.label>
                            @lang('marketplace::app.seller.settings.inventory-sources.create.longitude')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="longitude"
                            name="longitude"
                            :value="old('longitude')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.longitude')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="longitude" />
                    </x-marketplace::seller.form.control-group>

                    <!-- Priority -->
                    <x-marketplace::seller.form.control-group>
                        <x-marketplace::seller.form.control-group.label>
                            @lang('marketplace::app.seller.settings.inventory-sources.create.priority')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="priority"
                            name="priority"
                            :value="old('priority')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.priority')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="priority" />
                    </x-marketplace::seller.form.control-group>

                    <!-- Status -->
                    <x-marketplace::seller.form.control-group class="!mb-0">
                        <x-marketplace::seller.form.control-group.label>
                            @lang('marketplace::app.seller.settings.inventory-sources.create.status')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="switch"
                            name="status"
                            value="1"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.status')"
                            :checked="(bool) old('status')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="status" />
                    </x-marketplace::seller.form.control-group>
                </div>

                {!! view_render_event('bagisto.seller.settings.inventory_sources.create.card.settings.after') !!}

                {!! view_render_event('bagisto.seller.settings.inventory_sources.create.card.contact_info.before') !!}

                <!-- Contact Information -->
                <div class="rounded-xl border bg-white p-5">
                    <p class="mb-4 text-base font-semibold text-gray-800">
                        @lang('marketplace::app.seller.settings.inventory-sources.create.contact-info')
                    </p>

                    <!-- Contact name -->
                    <x-marketplace::seller.form.control-group>
                        <x-marketplace::seller.form.control-group.label class="required">
                            @lang('marketplace::app.seller.settings.inventory-sources.create.contact-name')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="contact_name"
                            name="contact_name"
                            rules="required"
                            :value="old('contact_name')"
                            :label="trans('marketplace::app.seller.settings.inventory-sources.create.contact-name')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.contact-name')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="contact_name" />
                    </x-marketplace::seller.form.control-group>

                    <!-- Contact Email -->
                    <x-marketplace::seller.form.control-group>
                        <x-marketplace::seller.form.control-group.label class="required">
                            @lang('marketplace::app.seller.settings.inventory-sources.create.contact-email')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="email"
                            id="contact_email"
                            name="contact_email"
                            rules="required|email"
                            :value="old('contact_email')"
                            :label="trans('marketplace::app.seller.settings.inventory-sources.create.contact-email')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.contact-email')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="contact_email" />
                    </x-marketplace::seller.form.control-group>

                    <!-- Contact Number -->
                    <x-marketplace::seller.form.control-group>
                        <x-marketplace::seller.form.control-group.label class="required">
                            @lang('marketplace::app.seller.settings.inventory-sources.create.contact-number')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="contact_number"
                            name="contact_number"
                            rules="required"
                            :value="old('contact_number')"
                            :label="trans('marketplace::app.seller.settings.inventory-sources.create.contact-number')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.contact-number')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="contact_number" />
                    </x-marketplace::seller.form.control-group>

                    <!-- Contact fax -->
                    <x-marketplace::seller.form.control-group class="!mb-0">
                        <x-marketplace::seller.form.control-group.label>
                            @lang('marketplace::app.seller.settings.inventory-sources.create.contact-fax')
                        </x-marketplace::seller.form.control-group.label>

                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="contact_fax"
                            name="contact_fax"
                            :value="old('contact_fax')"
                            :label="trans('marketplace::app.seller.settings.inventory-sources.create.contact-fax')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.contact-fax')"
                        />

                        <x-marketplace::seller.form.control-group.error control-name="contact_fax" />
                    </x-marketplace::seller.form.control-group>
                </div>

                {!! view_render_event('bagisto.seller.settings.inventory_sources.create.card.contact_info.after') !!}

            </div>
        </div>

        {!! view_render_event('bagisto.seller.settings.inventory_sources.create.create_form_controls.after') !!}
    </x-marketplace::seller.form>

    {!! view_render_event('bagisto.seller.settings.inventory_sources.create.after') !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-source-address-template"
        >
            <!-- Source Address -->
            <div class="rounded-xl border bg-white p-5">
                <p class="mb-4 text-base font-semibold text-gray-800">
                    @lang('marketplace::app.seller.settings.inventory-sources.create.address')
                </p>

                <!-- Country -->
                <x-marketplace::seller.form.control-group>
                    <x-marketplace::seller.form.control-group.label class="required">
                        @lang('marketplace::app.seller.settings.inventory-sources.create.country')
                    </x-marketplace::seller.form.control-group.label>
    
                    <x-marketplace::seller.form.control-group.control
                        type="select"
                        id="country"
                        name="country"
                        rules="required"
                        v-model="country"
                        :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.country')"
                    >
                        <option value="">
                            @lang('marketplace::app.seller.settings.inventory-sources.create.select-country')
                        </option>
    
                        @foreach (core()->countries() as $country)
                            <option value="{{ $country->code }}">
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </x-marketplace::seller.form.control-group.control>
    
                    <x-marketplace::seller.form.control-group.error control-name="country" />
                </x-marketplace::seller.form.control-group>
                        
                <!-- State -->
                <x-marketplace::seller.form.control-group>
                    <x-marketplace::seller.form.control-group.label class="required">
                        @lang('marketplace::app.seller.settings.inventory-sources.create.state')
                    </x-marketplace::seller.form.control-group.label>
    
                    <template v-if="haveStates()">
                        <x-marketplace::seller.form.control-group.control
                            type="select"
                            id="state"
                            name="state"
                            rules="required"
                            :value="old('state')"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.state')"
                        >
                            <option value="">
                                @lang('marketplace::app.seller.settings.inventory-sources.create.select-state')
                            </option>

                            <option 
                                v-for='(state, index) in countryStates[country]'
                                :value="state.code"
                            >
                                @{{ state.default_name }}
                            </option>
                        </x-marketplace::seller.form.control-group.control>
                    </template>
    
                    <template v-else>
                        <x-marketplace::seller.form.control-group.control
                            type="text"
                            id="state"
                            name="state"
                            rules="required"
                            :value="old('state')"
                            v-model="state"
                            :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.state')"
                        />
                    </template>

                    <x-marketplace::seller.form.control-group.error control-name="state" />
                </x-marketplace::seller.form.control-group>

                <!-- City -->
                <x-marketplace::seller.form.control-group>
                    <x-marketplace::seller.form.control-group.label class="required">
                        @lang('marketplace::app.seller.settings.inventory-sources.create.city')
                    </x-marketplace::seller.form.control-group.label>

                    <x-marketplace::seller.form.control-group.control
                        type="text"
                        id="city"
                        name="city"
                        rules="required"
                        :value="old('city')"
                        :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.city')"
                    />

                    <x-marketplace::seller.form.control-group.error control-name="city" />
                </x-marketplace::seller.form.control-group>

                <!-- Street -->
                <x-marketplace::seller.form.control-group>
                    <x-marketplace::seller.form.control-group.label class="required">
                        @lang('marketplace::app.seller.settings.inventory-sources.create.street')
                    </x-marketplace::seller.form.control-group.label>

                    <x-marketplace::seller.form.control-group.control
                        type="text"
                        id="street"
                        name="street"
                        rules="required"
                        :value="old('street')"
                        :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.street')"
                    />

                    <x-marketplace::seller.form.control-group.error control-name="street" />
                </x-marketplace::seller.form.control-group>

                <!-- postcode -->
                <x-marketplace::seller.form.control-group class="!mb-0">
                    <x-marketplace::seller.form.control-group.label class="required">
                        @lang('marketplace::app.seller.settings.inventory-sources.create.postcode')
                    </x-marketplace::seller.form.control-group.label>

                    <x-marketplace::seller.form.control-group.control
                        type="text"
                        id="postcode"
                        name="postcode"
                        rules="required"
                        :value="old('postcode')"
                        :placeholder="trans('marketplace::app.seller.settings.inventory-sources.create.postcode')"
                    />

                    <x-marketplace::seller.form.control-group.error control-name="postcode" />
                </x-marketplace::seller.form.control-group>
            </div>
        </script>

        <script type="module">
            app.component('v-source-address', {
                template: '#v-source-address-template',

                data() {
                    return {
                        country: "{{ old('country') }}",

                        state: "{{ old('state')  }}",

                        countryStates: @json(core()->groupedStatesByCountries())
                    }
                },

                methods: {
                    haveStates() {
                        return !!this.countryStates[this.country]?.length;
                    },
                }
            });
        </script>
    @endpushOnce
</x-marketplace::seller.layouts>
