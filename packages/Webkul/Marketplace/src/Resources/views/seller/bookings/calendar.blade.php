<v-booking-calendar></v-booking-calendar>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-booking-calendar-template"
    >
        <div class="mt-7">
            <div class="calendar-container">
                <vue-calendar
                    hide-view-selector
                    :watchRealTime="true"
                    :twelveHour="true"
                    :class="'w-full h-full'"
                    :disable-views="['years', 'year', 'month', 'day']"
                    :events="events"
                    @ready="getBookings"
                    @view-change="getBookings"
                    @event-click="toggleEvent"
                >
                    <!-- Left Arrow -->
                    <template #arrow-prev="">
                        <span class="mp-arrow-left-stylish-icon"></span>
                    </template>

                    <!-- Right Arrow -->
                    <template #arrow-next="">
                        <span class="mp-arrow-right-stylish-icon"></span>
                    </template>

                    <!-- No Events Content -->
                    <template #no-event>
                        <p class="hidden"></p>
                    </template>

                    <!-- Content -->
                    <template #event="{ event, view }">
                        <div
                            class="slot relative h-full cursor-pointer rounded-l border-l-4 text-left text-xs"
                            :class="[
                                event.order_status === 'pending' ? 'bg-yellow-100 border-yellow-500 hover:bg-yellow-200 hover:border-yellow-600' :
                                event.order_status === 'completed' ? 'bg-green-100 border-green-500 hover:border-green-600 hover:bg-green-200' :
                                event.order_status === 'closed' ? 'bg-blue-100 border-blue-500 hover:border-blue-600 hover:bg-blue-200' :
                                event.order_status === 'canceled' ? 'bg-red-100 border-red-500 hover:border-red-600 hover:bg-red-200' :
                                'bg-green-100 border-green-600 hover:border-green-600 hover:bg-green-200',
                                event.time_difference ? 'p-2' : 'p-1'
                            ]"
                        >
                            <span>
                                @{{ formatTimeRange(event.start, event.end) }}
                            </span>
                        </div>
                    </template>
                </vue-calendar>
            </div>

            <x-marketplace::seller.modal ref="bookingModel">
                <!-- Modal Header -->
                <x-slot:header>
                    <div class="text-lg font-medium text-[#1F2937]">
                        @lang('marketplace::app.seller.bookings.calendar.booking-details')
                    </div>
                </x-slot>

                <!-- Modal Content -->
                <x-slot:content>
                    <div class="grid text-sm font-normal">
                        <div class="grid grid-cols-1 gap-2.5 border-b pb-4">
                            <!-- Booking Date -->
                            <div class="grid grid-cols-[100px_auto] gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'@lang('marketplace::app.seller.bookings.calendar.booking-date')'"
                                >
                                </div>

                                <div
                                    class="font-medium text-[#1F2937]"
                                    v-text="event.created_at"
                                >
                                </div>
                            </div>

                            <!-- Time Slot -->
                            <div class="grid grid-cols-[100px_auto] gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'@lang('marketplace::app.seller.bookings.calendar.time-slot')'"
                                >
                                </div>

                                <div class="font-medium text-[#1F2937]">
                                    @{{ formatTimeRange(event.start, event.end) }}
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-[80px_80px_auto] gap-2.5 border-b py-4">
                            <!-- Order Id -->
                            <div class="grid grid-cols-1 gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'@lang('marketplace::app.seller.bookings.calendar.order-id')'"
                                >
                                </div>

                                <div class="font-medium text-[#1F2937]">
                                    #@{{ event.order_id }}
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="grid grid-cols-1 gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'@lang('marketplace::app.seller.bookings.calendar.price')'"
                                >
                                </div>

                                <div
                                    class="font-medium text-[#1F2937]"
                                    v-text="$shop.formatPrice(event.order_total)"
                                >
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="grid grid-cols-1 gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'@lang('marketplace::app.seller.bookings.calendar.status')'"
                                >
                                </div>

                                <div
                                    class="w-fit rounded-2xl px-2.5 py-1 font-medium text-white"
                                    :class="[
                                        event.order_status === 'pending' ? 'bg-yellow-500' :
                                        event.order_status === 'completed' ? 'bg-darkGreen' :
                                        event.order_status === 'closed' ? 'bg-darkBlue':
                                        event.order_status === 'canceled' ? 'bg-darkPink' :
                                        'bg-green-500',
                                    ]"
                                >
                                    <span v-text="
                                        event.order_status === 'completed' ? '@lang('marketplace::app.seller.bookings.calendar.done')' :
                                        event.order_status === 'pending' ? '@lang('marketplace::app.seller.bookings.calendar.pending')' :
                                        event.order_status === 'canceled' ? '@lang('marketplace::app.seller.bookings.calendar.canceled')' :
                                        event.order_status === 'closed' ? '@lang('marketplace::app.seller.bookings.calendar.closed')' :
                                        event.order_status"
                                    >
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 items-center gap-2.5 pt-4 font-medium text-[#1F2937]">
                            <!-- Customer Name -->
                            <div class="flex items-center gap-2">
                                <span class="icon-users text-2xl text-gray-500"></span>

                                <span v-text="event.customer_name"></span>
                            </div>

                            <!-- Customer Email -->
                            <div class="flex items-center gap-2">
                                <span class="mp-email-icon text-2xl text-gray-500"></span>

                                <span v-text="event.customer_email"></span>
                            </div>

                            <!-- Customer Phone Number -->
                            <div class="flex gap-2">
                                <span class="mp-phone-icon text-2xl text-gray-500"></span>

                                <span v-text="event.customer_phone"></span>
                            </div>

                            <!-- Customer Address -->
                            <div class="flex gap-2">
                                <span class="mp-location-icon text-2xl text-gray-500"></span>

                                <span v-html=event.address></span>
                            </div>
                        </div>
                    </div>
                </x-slot>

                <!-- Modal Footer -->
                <x-slot:footer>
                    <a
                        class="primary-button h-9 p-2.5 text-base"
                        :href="`{{ route('seller.orders.view', '') }}/${event.order_id}`"
                    >
                        @lang('marketplace::app.seller.bookings.calendar.view-details')
                    </a>
                </x-slot>
            </x-marketplace::seller.modal>
        </div>
    </script>

    <script type="module">
        app.component('v-booking-calendar', {
            template: '#v-booking-calendar-template',
            
            data() {
                return {
                    events: [],

                    event: {},
                }
            },

            methods: {
                getBookings({ startDate, endDate }) {                    
                    const formattedStartDate = new Date(startDate).toLocaleDateString("en-US");
                    const formattedEndDate = new Date(endDate).toLocaleDateString("en-US");

                    this.$axios.get("{{ route('seller.bookings.index') }}", {
                        params: {
                            view_type: 'calendar',
                            start: formattedStartDate,
                            end: formattedEndDate
                        }
                    })
                    .then(response => {
                        this.events = response.data.bookings;

                        this.events.forEach(element => {
                            const differenceInMinutes = Math.floor((new Date(element.end) - new Date(element.start)) / (1000 * 60));
                            const totalMinutes = Math.floor(differenceInMinutes / 60) * 60 + (differenceInMinutes % 60);

                            element.time_difference = totalMinutes > 60;
                        });
                    })
                    .catch(error => {});
                },

                toggleEvent(event) {
                    this.event = event;                    

                    this.$refs.bookingModel.toggle();
                },

                formatTimeRange(start, end) {
                    const options = { hour12: true, hour: 'numeric', minute: '2-digit' };
                    const startTime = new Date(start).toLocaleTimeString('en-US', options);
                    const endTime = new Date(end).toLocaleTimeString('en-US', options);

                    return `${startTime} - ${endTime}`;
                }
            },
        });
    </script>
@endPushOnce

@pushOnce('styles')
    <style>
        .vuecal__flex {
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        .vuecal__title-bar {
            background-color: transparent;
            border-bottom: 1px solid #DDDDDD;
        }

        .vuecal__title {
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 500;
        }
    </style>
@endPushOnce