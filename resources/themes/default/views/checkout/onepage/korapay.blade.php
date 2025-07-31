<div class="mt-2">
    <span class="text-base font-semibold">
        {{ __('shop::app.checkout.onepage.payment.payment-method') }}
    </span>

    {{-- This hidden input tells Bagisto which payment method is selected --}}
    <input
        type="radio"
        name="payment[method]"
        id="{{ $payment['method'] }}"
        value="{{ $payment['method'] }}"
        class="hidden"
        @change="methodSelected('{{ $payment['method'] }}')"
        {{ $payment['method'] == 'korapay' ? 'checked' : '' }}
    />

    <div class="grid gap-4 mt-4">
        {{-- Radio button to select payment type (Card or MoMo) --}}
        <div>
            <input type="radio" name="korapay_payment_type" id="korapay_card" value="card" class="hidden peer" checked>
            <label for="korapay_card" class="block p-4 border rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600">
                <h3 class="font-semibold">Pay with Card</h3>
                <p class="text-sm text-gray-500">Use your Visa, Mastercard, or other debit/credit card.</p>
            </label>
        </div>

        <div>
            <input type="radio" name="korapay_payment_type" id="korapay_momo" value="momo" class="hidden peer">
            <label for="korapay_momo" class="block p-4 border rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600">
                <h3 class="font-semibold">Pay with Mobile Money</h3>
                <p class="text-sm text-gray-500">Pay directly from your MTN, Airtel, etc. wallet.</p>
            </label>

            {{-- The phone number input field, shown only when MoMo is selected --}}
            <div id="korapay_momo_details" class="hidden pl-4 mt-4">
                <label for="phone_number" class="block text-sm font-medium">Mobile Money Number</label>
                <input
                    type="text"
                    name="phone_number"
                    id="phone_number"
                    class="w-full px-3 py-2 mt-1 border rounded-md"
                    placeholder="e.g., 233541234567"
                />
            </div>
        </div>
    </div>
</div>

{{-- JavaScript to handle form actions and show/hide the phone input --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form[id^="checkout-form"]'); // Find the checkout form
        const paymentTypeRadios = document.querySelectorAll('input[name="korapay_payment_type"]');
        const momoDetailsDiv = document.getElementById('korapay_momo_details');
        const phoneInput = document.getElementById('phone_number');

        // Function to update the form's action URL
        function updateFormAction() {
            const selectedType = document.querySelector('input[name="korapay_payment_type"]:checked').value;
            if (selectedType === 'card') {
                form.action = "{{ route('korapay.card.redirect') }}";
                momoDetailsDiv.style.display = 'none';
                phoneInput.removeAttribute('required');
            } else {
                form.action = "{{ route('korapay.momo.redirect') }}";
                momoDetailsDiv.style.display = 'block';
                phoneInput.setAttribute('required', 'required');
            }
        }

        // Add event listeners to radio buttons
        paymentTypeRadios.forEach(radio => {
            radio.addEventListener('change', updateFormAction);
        });

        // Set the initial form action when the page loads
        updateFormAction();
    });
</script>