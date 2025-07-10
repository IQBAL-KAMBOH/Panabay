{!! view_render_event('marketplace.admin.seller.edit.card.commission.before', ['seller' => $seller]) !!}

<v-seller-commission></v-seller-commission>

{!! view_render_event('marketplace.admin.seller.edit.card.commission.after', ['seller' => $seller]) !!}

@push('scripts')
    <script
        type="text/x-template"
        id="v-seller-commission-template"
    >
        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
            <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                @lang('marketplace::app.admin.sellers.edit.commission.title')
            </p>

            <x-admin::form.control-group class="mb-2.5">
                <x-admin::form.control-group.label>
                    @lang('marketplace::app.admin.sellers.edit.commission.status')
                </x-admin::form.control-group.label>

                <x-admin::form.control-group.control
                    type="switch"
                    name="commission_enable"
                    :value="1"
                    v-model="commission_enable"
                    ::checked="commission_enable"
                    @change="change()"
                    :label="trans('marketplace::app.admin.sellers.edit.commission.status')"
                />
                
                <x-admin::form.control-group.error control-name="commission_enable" />
            </x-admin::form.control-group>

            <x-admin::form.control-group class="mb-2.5">
                <x-admin::form.control-group.label class="required">
                    @lang('marketplace::app.admin.sellers.edit.commission.percentage')
                </x-admin::form.control-group.label>

                <x-admin::form.control-group.control
                    type="text"
                    name="commission_percentage"
                    ::rules="isRequired ? 'required|between:.5,99' : ''"
                    v-model="commission_percentage"
                    :label="trans('marketplace::app.admin.sellers.edit.commission.percentage')"
                    :placeholder="trans('marketplace::app.admin.sellers.edit.commission.percentage')"
                    ::disabled="isActive == false ? true : false"
                />

                <x-admin::form.control-group.error control-name="commission_percentage" />
            </x-admin::form.control-group>
        </div>
    </script>

    <script type="module">
        app.component('v-seller-commission', {
            template: '#v-seller-commission-template',

            data() {
                return {
                    commission_enable: @json($seller->commission_enable),
                    
                    commission_percentage: @json($seller->commission_percentage),

                    isActive: false,
                            
                    isRequired: false,
                }
            },

            created() {
                if (this.commission_enable) {
                    this.isActive = this.isRequired = true;
                }
            },

            methods: {
                change() {
                    this.isActive = ! this.isActive;
                        
                    this.isRequired = ! this.isRequired;
                },
            },
        });
    </script>
@endpush
