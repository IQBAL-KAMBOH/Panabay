@if (core()->getConfigData('sales.payment_methods.korapay.active'))
    <div class="flex items-center gap-x-5">
        <input
            type="radio"
            name="payment[method]"
            value="korapay"
            id="korapay"
            class="peer hidden"
            v-model="payment.method"
        />
        <label
            for="korapay"
            class="icon-radio-normal peer-checked:icon-radio-active cursor-pointer text-2xl"
        ></label>
        <label for="korapay" class="cursor-pointer text-xl font-semibold">
            {{ core()->getConfigData('sales.payment_methods.korapay.title', 'KoraPay') }}
        </label>
    </div>
    <div class="px-12 pb-5 max-sm:px-0" v-if="payment.method == 'korapay'">
        <p class="text-base text-zinc-500">
            {{ core()->getConfigData('sales.payment_methods.korapay.description') }}
        </p>
    </div>
@endif