<v-datagrid-export {{ $attributes }}>
    <div class="transparent-button hover:bg-gray-200">
        <span class="icon-admin-export text-xl text-gray-600"></span>

        @lang('marketplace::app.components.seller.datagrid.export.export')
    </div>
</v-datagrid-export>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-datagrid-export-template"
    >
        <div>
            <x-marketplace::seller.modal ref="exportModal">
                <!-- Modal Toggler -->
                <x-slot:toggle>
                    <button class="transparent-button hover:bg-gray-200 py-1.5 px-2.5">
                        <span class="mp-export-icon text-wxl text-gray-600"></span>

                        @lang('marketplace::app.components.seller.datagrid.export.export')
                    </button>
                </x-slot>

                <!-- Modal Header -->
                <x-slot:header>
                    <p class="text-lg font-bold text-gray-800">
                        @lang('marketplace::app.components.seller.datagrid.export.download')
                    </p>
                </x-slot>

                <!-- Modal Content -->
                <x-slot:content>
                    <x-marketplace::seller.form action="">
                        <x-marketplace::seller.form.control-group class="!mb-0">
                            <x-marketplace::seller.form.control-group.control
                                type="select"
                                name="format"
                                v-model="format"
                            >
                                <option value="csv">
                                    @lang('marketplace::app.components.seller.datagrid.export.csv')
                                </option>

                                <option value="xls">
                                    @lang('marketplace::app.components.seller.datagrid.export.xls')
                                </option>

                                <option value="xlsx">
                                    @lang('marketplace::app.components.seller.datagrid.export.xlsx')
                                </option>
                            </x-marketplace::seller.form.control-group.control>
                        </x-marketplace::seller.form.control-group>
                    </x-marketplace::seller.form>
                </x-slot>

                <!-- Modal Footer -->
                <x-slot:footer>
                    <!-- Save Button -->
                    <x-shop::button
                        button-type="button"
                        class="primary-button"
                        :title="trans('marketplace::app.components.seller.datagrid.export.export')"
                        @click="download"
                    />
                </x-slot>
            </x-marketplace::seller.modal>
        </div>
    </script>

    <script type="module">
        app.component('v-datagrid-export', {
            template: '#v-datagrid-export-template',

            props: ['src'],

            data() {
                return {
                    format: 'xls',

                    available: null,

                    applied: null,
                };
            },

            mounted() {
                this.registerEvents();
            },

            methods: {
                /**
                 * Registers events to update properties and trigger the download process.
                 *
                 * @returns {void}
                 */
                registerEvents() {
                    this.$emitter.on('change-datagrid', this.updateProperties);
                },

                /**
                 * Updates the available and applied properties with new values.
                 *
                 * @param {object} data - Object containing available and applied properties.
                 * @returns {void}
                 */
                updateProperties({ src, available, applied }) {
                    if (this.src !== src) {
                        return;
                    }

                    this.available = available;

                    this.applied = applied;
                },

                /**
                 * Initiates the download process for exporting data.
                 *
                 * @returns {void}
                 */
                download() {
                    if (! this.available?.records?.length) {
                        this.$emitter.emit('add-flash', { type: 'warning', message: '@lang('marketplace::app.components.seller.datagrid.export.no-records')' });

                        this.$refs.exportModal.toggle();
                    } else {
                        let params = {
                            export: 1,

                            format: this.format,

                            sort: {},

                            filters: {},
                        };

                        if (
                            this.applied.sort.column &&
                            this.applied.sort.order
                        ) {
                            params.sort = this.applied.sort;
                        }

                        this.applied.filters.columns.forEach(column => {
                            params.filters[column.index] = column.value;
                        });

                        this.$axios
                            .get(this.src, {
                                params,
                                responseType: 'blob',
                            })
                            .then((response) => {
                                const url = window.URL.createObjectURL(new Blob([response.data]));

                                /**
                                 * Extracting filename from content-disposition header.
                                 */
                                let filename = `${(Math.random() + 1).toString(36).substring(7)}.${this.format}`;

                                const contentDisposition = response.headers['content-disposition'];

                                if (contentDisposition && contentDisposition.indexOf('attachment') !== -1) {
                                    const filenameMatch = contentDisposition.match(/filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/);

                                    if (filenameMatch != null && filenameMatch[1]) {
                                        filename = filenameMatch[1].replace(/['"]/g, '');
                                    }
                                }

                                /**
                                 * Link generation.
                                 */
                                const link = document.createElement('a');
                                link.href = url;
                                link.setAttribute('download', filename);

                                /**
                                 * Adding a link to a document, clicking on the link, and then removing the link.
                                 */
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);

                                this.$refs.exportModal.toggle();
                            });
                    }
                },
            },
        });
    </script>
@endPushOnce
