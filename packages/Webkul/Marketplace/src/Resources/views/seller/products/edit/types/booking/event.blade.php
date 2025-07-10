{!! view_render_event('bagisto.seller.product.edit.booking.event.before', ['product' => $product]) !!}

<v-event-booking></v-event-booking>

{!! view_render_event('bagisto.seller.product.edit.booking.event.after', ['product' => $product]) !!}

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-event-booking-template"
    >
        <!-- Tickets Component -->
        <div class="flex items-center justify-between gap-5 py-2">
            <div class="flex-1 flex flex-col gap-2">
                <p class="text-base font-semibold text-gray-800">
                    @lang('marketplace::app.seller.products.edit.types.booking.event.title')
                </p>
            </div>

            <!-- Add Ticket Button -->
            <div class="flex items-center gap-x-1">
                <div
                    class="secondary-button"
                    @click="add"
                >
                    @lang('marketplace::app.seller.products.edit.types.booking.event.add')
                </div>
            </div>
        </div>

         <!-- Table Information -->
         <div class="overflow-x-auto">
            <template
                v-if="tickets?.length" 
                v-for="(element, index) in tickets"
            >
                <div class="border-b border-slate-300 last:border-b-0">
                    <div class="my-2.5 flex justify-between gap-2.5">
                        <div class="grid place-content-start gap-1">
                            <!-- Hidden Inputs -->
                            <input
                                type="hidden"
                                :name="'booking[tickets][ticket_' + index + '][' + currentLocaleCode + '][name]'"
                                :value="element.name"
                            />

                            <input
                                type="hidden"
                                :name="'booking[tickets][ticket_' + index + '][qty]'"
                                :value="element.qty"
                            />

                            <input
                                type="hidden"
                                :name="'booking[tickets][ticket_' + index + '][price]'"
                                :value="element.price"
                            />

                            <input
                                type="hidden"
                                :name="'booking[tickets][ticket_' + index + '][special_price]'"
                                :value="element.special_price"
                            />

                            <input
                                type="hidden"
                                :name="'booking[tickets][ticket_' + index + '][special_price_from]'"
                                :value="element.special_price_from"
                            />

                            <input
                                type="hidden"
                                :name="'booking[tickets][ticket_' + index + '][special_price_to]'"
                                :value="element.special_price_to"
                            />

                            <input
                                type="hidden"
                                :name="'booking[tickets][ticket_' + index + '][' + currentLocaleCode + '][description]'"
                                :value="element.description"
                            />

                            <!-- Name-->
                            <p
                                class="text-base"
                                v-text="element.name"
                            >
                            </p>

                            <p class="flex gap-2">
                                <!-- Price -->
                                <span
                                    class="text-sm font-normal"
                                    v-if="element.price"
                                >
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.price') - @{{ element.price }},
                                </span>

                                <!-- Special Price -->
                                <span
                                    class="text-sm font-normal"
                                    v-if="element.special_price"
                                >
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.special-price') - @{{ element.special_price }},
                                </span>
    
                                 <!-- Qty -->
                                <span class="text-sm font-normal">
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.qty') - @{{ element.qty }}
                                </span>
                            </p>

                            <p class="text-gray-600">
                                <!-- Valid From -->
                                <span
                                    class="text-sm text-gray-600"
                                    v-if="element.special_price_from"
                                >
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.special-price-from') - @{{ element.special_price_from }},
                                </span>

                                <!-- Valid Until -->
                                <span
                                    class="text-sm text-gray-600"
                                    v-if="element.special_price_to"
                                >
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.special-price-to') - @{{ element.special_price_to }}
                                </span>
                            </p>

                            <!-- Description -->
                            <p class="text-gray-600">
                                @lang('marketplace::app.seller.products.edit.types.booking.event.description') - @{{ element.description }}
                            </p>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex place-content-start gap-x-5 text-right">
                            <p
                                class="cursor-pointer text-blue-600 transition-all hover:underline"
                                @click="ticketItem=element;toggle()"
                            >
                                @lang('marketplace::app.seller.products.edit.types.booking.event.edit')
                            </p>
                            
                            <p
                                class="cursor-pointer text-red-600 transition-all hover:underline"
                                @click="remove(element.id)"
                            >
                                @lang('marketplace::app.seller.products.edit.types.booking.event.delete')
                            </p>
                        </div>
                    </div>
                </div>
            </template>

            <!-- For Empty Illustration -->
            <div v-else>
                <v-empty-info ::type="event"></v-empty-info>
            </div>
        </div>

        <!-- Add Drawer Form -->
        <x-marketplace::seller.form
            v-slot="{ meta, errors, handleSubmit }"
            as="div"
            ref="modelForm"
        >
            <form @submit.prevent="handleSubmit($event, store)">
                <x-marketplace::seller.drawer ref="drawerForm">
                    <x-slot:header>
                        <div class="flex items-center justify-between">
                            <p
                                class="my-2.5 text-xl font-medium"
                                v-text="this.ticketItem.id 
                                    ? '@lang('marketplace::app.seller.products.edit.types.booking.event.modal.edit')'
                                    : '@lang('marketplace::app.seller.products.edit.types.booking.event.add')'"
                            >
                            </p>
        
                            <div class="ltr:mr-11 rtl:ml-11">
                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.modal.save')
                                </button>
                            </div>
                        </div>
                    </x-slot:header>
        
                    <x-slot:content class="px-4">
                        <div class="grid grid-cols-2 gap-4">
                            <!-- ID -->
                            <x-marketplace::seller.form.control-group.control
                                type="hidden"
                                name="id"
                                ::value="ticketItem.id"
                            />

                            <!-- Name -->
                            <x-marketplace::seller.form.control-group>
                                <x-marketplace::seller.form.control-group.label class="required">
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.name')
                                </x-marketplace::seller.form.control-group.label>

                                <x-marketplace::seller.form.control-group.control
                                    type="text"
                                    name="name"
                                    rules="required"
                                    v-model="ticketItem.name"
                                    :label="trans('marketplace::app.seller.products.edit.types.booking.event.name')"
                                    :placeholder="trans('marketplace::app.seller.products.edit.types.booking.event.name')"
                                />

                                <x-marketplace::seller.form.control-group.error control-name="name" />
                            </x-marketplace::seller.form.control-group>

                            <!-- Quantity -->
                            <x-marketplace::seller.form.control-group>
                                <x-marketplace::seller.form.control-group.label class="required">
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.qty')
                                </x-marketplace::seller.form.control-group.label>
            
                                <x-marketplace::seller.form.control-group.control
                                    type="text"
                                    name="qty"
                                    rules="required|min_value:0"
                                    v-model="ticketItem.qty"
                                    :label="trans('marketplace::app.seller.products.edit.types.booking.event.qty')"
                                    :placeholder="trans('marketplace::app.seller.products.edit.types.booking.event.qty')"
                                />
            
                                <x-marketplace::seller.form.control-group.error control-name="qty" />
                            </x-marketplace::seller.form.control-group>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Price -->
                            <x-marketplace::seller.form.control-group>
                                <x-marketplace::seller.form.control-group.label class="required">
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.price')
                                </x-marketplace::seller.form.control-group.label>
            
                                <x-marketplace::seller.form.control-group.control
                                    type="text"
                                    name="price"
                                    rules="required"
                                    v-model="ticketItem.price"
                                    :label="trans('marketplace::app.seller.products.edit.types.booking.event.price')"
                                    :placeholder="trans('marketplace::app.seller.products.edit.types.booking.event.price')"
                                />

                                <x-marketplace::seller.form.control-group.error control-name="price" />
                            </x-marketplace::seller.form.control-group>

                            <!-- Special Price -->
                            <x-marketplace::seller.form.control-group>
                                <x-marketplace::seller.form.control-group.label>
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.special-price')
                                </x-marketplace::seller.form.control-group.label>

                                <x-marketplace::seller.form.control-group.control
                                    type="number"
                                    name="special_price"
                                    ::rules="'min_value:0|max_value:' + ticketItem.price"
                                    v-model="ticketItem.special_price"
                                    :label="trans('marketplace::app.seller.products.edit.types.booking.event.special-price')"
                                    :placeholder="trans('marketplace::app.seller.products.edit.types.booking.event.special-price')"
                                />

                                <x-marketplace::seller.form.control-group.error control-name="special_price" />
                            </x-marketplace::seller.form.control-group>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Special Price From -->
                            <x-marketplace::seller.form.control-group>
                                <x-marketplace::seller.form.control-group.label>
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.valid-from')
                                </x-marketplace::seller.form.control-group.label>

                                <x-marketplace::seller.form.control-group.control
                                    type="datetime"
                                    name="special_price_from"
                                    ::rules="ticketItem.special_price_from ? 'required|after:{{\Carbon\Carbon::yesterday()->format('Y-m-d 23:59:59')}}' : ''" 
                                    v-model="ticketItem.special_price_from"
                                    :label="trans('marketplace::app.seller.products.edit.types.booking.event.valid-from')"
                                    :placeholder="trans('marketplace::app.seller.products.edit.types.booking.event.valid-from')"
                                />

                                <x-marketplace::seller.form.control-group.error control-name="special_price_from" />
                            </x-marketplace::seller.form.control-group>

                            <!-- Special Price To -->
                            <x-marketplace::seller.form.control-group>
                                <x-marketplace::seller.form.control-group.label>
                                    @lang('marketplace::app.seller.products.edit.types.booking.event.valid-until')
                                </x-marketplace::seller.form.control-group.label>

                                <x-marketplace::seller.form.control-group.control
                                    type="datetime"
                                    name="special_price_to"
                                    ::rules="ticketItem.special_price_from ? 'after:' + ticketItem.special_price_from : ''"
                                    v-model="ticketItem.special_price_to"
                                    :label="trans('marketplace::app.seller.products.edit.types.booking.event.valid-until')"
                                    :placeholder="trans('marketplace::app.seller.products.edit.types.booking.event.valid-until')"
                                />
            
                                <x-marketplace::seller.form.control-group.error control-name="special_price_to" />
                            </x-marketplace::seller.form.control-group>
                        </div>

                        <!-- Description -->
                        <x-marketplace::seller.form.control-group class="!mb-0">
                            <x-marketplace::seller.form.control-group.label class="required">
                                @lang('marketplace::app.seller.products.edit.types.booking.event.description')
                            </x-marketplace::seller.form.control-group.label>
        
                            <x-marketplace::seller.form.control-group.control
                                type="textarea"
                                name="[description]"
                                rules="required"
                                v-model="ticketItem.description"
                                :label="trans('marketplace::app.seller.products.edit.types.booking.event.description')"
                                :placeholder="trans('marketplace::app.seller.products.edit.types.booking.event.description')"
                                rows="9"
                            />

                            <x-marketplace::seller.form.control-group.error control-name="[description]" />
                        </x-marketplace::seller.form.control-group>
                    </x-slot:content>
                </x-marketplace::seller.drawer>
            </form>
        </x-marketplace::seller.form>
    </script>

    <script type="module">
        app.component('v-event-booking', {
            template: '#v-event-booking-template',

            data() {
                return {
                    tickets: @json($bookingProduct ? $bookingProduct->event_tickets()->get() : []),

                    optionRowCount: 0,

                    currentLocaleCode: @json(core()->getCurrentLocale()->code),
                }
            },

            methods: {
                store(params) {
                    if (! params.id) {
                            this.optionRowCount++;

                            params.id = 'option_' + this.optionRowCount;
                        }

                        let foundIndex = this.tickets.findIndex(item => item.id === params.id);

                        if (foundIndex !== -1) {
                            this.tickets[foundIndex] = { 
                                ...this.tickets[foundIndex].params, 
                                ...params
                            };
                        } else {
                            this.tickets.push(params);
                        }

                    this.toggle();
                },

                add() {
                    this.ticketItem = {
                        name: '',
                        price: '',
                        qty: '',
                        description: '',
                        special_price: '',
                        special_price_from: '',
                        special_price_to: ''
                    };

                    this.toggle();
                },

                remove(id) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.tickets = this.tickets.filter(option => option.id !== id);
                        },
                    });
                },

                toggle() {
                    this.$refs.drawerForm.toggle();
                },
            }
        });
    </script>
@endpushOnce
