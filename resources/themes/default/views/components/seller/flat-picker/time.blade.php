<v-time-picker {{ $attributes }}>
    {{ $slot }}
</v-time-picker>

@pushOnce('scripts')
    <script type="text/x-template" id="v-time-picker-template">
        <span class="w-full relative inline-block">
            <slot></slot>

            <i class="mp-calendar-icon text-2xl text-gray-400 absolute ltr:right-2 rtl:left-2 top-[50%] -translate-y-[50%]"></i>
        </span>
    </script>

    <script type="module">
        app.component('v-time-picker', {
            template: '#v-time-picker-template',

            data () {
                return {
                    timePicker: null
                };
            },

            mounted () {
                let options = this.setOptions();

                this.activate(options);
            },

            methods: {
                setOptions () {
                    return {
                        dateFormat: 'H:i',
                        altFormat: 'H:i',
                        noCalendar: true,
                        altInput: true,
                        enableTime: true,
                        time_24hr: true,

                        onChange: (selectedDates, timeStr, instance) => {
                            this.$emit("onChange", timeStr);
                        }
                    };
                },

                activate (options) {
                    let element = this.$el.getElementsByTagName("input")[0];

                    this.timePicker = new Flatpickr(element, options);
                },
            }
        });
    </script>
@endPushOnce
