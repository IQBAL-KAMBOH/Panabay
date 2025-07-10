<x-admin::layouts>
    <x-slot:title>
        @lang('marketplace::app.admin.inventory-sources.index.title')
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="py-3 text-xl font-bold text-gray-800 dark:text-white">
            @lang('marketplace::app.admin.inventory-sources.index.title')
        </p>
    </div>

    {!! view_render_event('marketplace.admin.inventory_sources.list.before') !!}

    <v-marketplace-inventory-source></v-marketplace-inventory-source>

    {!! view_render_event('marketplace.admin.inventory_sources.list.after') !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-marketplace-inventory-source-template"
        >
            <x-admin::datagrid
                :src="route('admin.marketplace.inventory_sources.index')"
                :isMultiRow="true"
            >
                <template #body="{
                    isLoading,
                    available,
                    applied,
                    selectAll,
                    sort,
                    performAction
                }">
                    <template v-if="isLoading">
                        <x-admin::shimmer.datagrid.table.body :isMultiRow="true" />
                    </template>

                    <template v-else>
                        <div
                            class="row grid items-center gap-2.5 border-b px-4 py-4 text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                            v-for="record in available.records"
                            style="grid-template-columns: repeat(7, minmax(0px, 1fr));"
                        >
                            <template v-for="column in available.columns">
                                <p
                                    class="break-words"
                                    v-html="record[column.index]"
                                    v-if="column.visibility"
                                >
                                </p>
                            </template>

                            <p
                                class="place-self-end"
                                v-if="available.actions.length"
                            >
                                <span
                                    class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                    :class="action.icon"
                                    v-text="! action.icon ? action.title : ''"
                                    v-for="action in record.actions"
                                    @click="view(action.url)"
                                >
                                </span>
                            </p>
                        </div>
                    </template>
                </template>
            </x-admin::datagrid>

            <!-- Drawer content -->
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                <x-admin::drawer ref="inventorySource">
                    <!-- Drawer Header -->
                    <x-slot:header>
                        <div class="flex gap-x-2.5 items-center">
                            <p class="text-xl font-medium dark:text-white py-2">
                                @{{ "@lang('marketplace::app.admin.inventory-sources.index.view.title')".replace(':id', inventorySource.id) }}
                            </p>

                            <p :class="[inventorySource.status ? 'label-active': 'label-info']">
                                @{{ inventorySource.status ? "@lang('marketplace::app.admin.inventory-sources.index.view.active')" : "@lang('marketplace::app.admin.inventory-sources.index.view.inactive')" }}
                            </p>
                        </div>
                    </x-slot>

                    <!-- Drawer Content -->
                    <x-slot:content>
                        <div
                            class="p-2.5 border-b border-gray-200 dark:border-gray-700 last:!border-0"
                            v-for="(section, key) in sections"
                        >
                            <p class="text-base font-semibold text-gray-800 dark:text-gray-200">
                                @{{ section.title }}
                            </p>
                        
                            <div class="grid grid-cols-2 gap-4 mt-3">
                                <div class="space-y-1.5">
                                    <p
                                        class="text-sm font-normal text-gray-800 dark:text-gray-300"
                                        v-for="(field, key) in section.fields"
                                    >
                                        @{{ field }}
                                    </p>
                                </div>
                        
                                <div class="space-y-1.5">
                                    <p
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                        v-for="(field, key) in section.fields"
                                    >
                                        @{{ inventorySource[key] ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                </x-admin::drawer>
            </div>
        </script>

        <script type="module">
            app.component('v-marketplace-inventory-source', {
                template: '#v-marketplace-inventory-source-template',

                data() {
                    return {
                        inventorySource: {},

                        translations: @json(trans('marketplace::app.admin.inventory-sources.index.view')),
                    }
                },

                computed: {
                    sections() {
                        const sectionDefinitions = {
                            seller_info: [
                                'shop_title',
                                'seller_name'
                            ],
                            general_info: [
                                'code',
                                'name',
                                'description'
                            ],
                            contact_info: [
                                'contact_name',
                                'contact_email',
                                'contact_number',
                                'contact_fax'
                            ],
                            address: [
                                'country',
                                'state',
                                'city',
                                'postcode',
                                'street'
                            ],
                            settings: [
                                'latitude',
                                'longitude',
                                'priority'
                            ],
                        };

                        return Object.fromEntries(
                            Object.entries(sectionDefinitions).map(([key, fields]) => [
                                key,
                                this.generateSection(key, fields)
                            ])
                        );
                    }
                },

                methods: {
                    generateSection(key, fields) {
                        return {
                            title: this.translations[key.replace('_', '-')],
                            fields: fields.reduce((acc, field) => {
                                acc[field] = this.translations[field.replace('_', '-')];
                                return acc;
                            }, {}),
                        };
                    },

                    view(url) {
                        this.$axios.get(url)
                            .then(response => {                                
                                this.inventorySource = response.data.data;

                                this.$refs.inventorySource.open(); 
                            })
                            .catch(error => {
                            });                       
                    },
                }
            })
        </script>
    @endPushOnce
</x-admin::layouts>