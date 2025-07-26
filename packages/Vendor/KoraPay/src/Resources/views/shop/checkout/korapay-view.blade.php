{{-- This view is loaded on the checkout page when Kora Pay is selected --}}
<span class="font-semibold">You will be prompted to complete your payment after placing the order.</span>

{{-- 1. Include the Kora Pay script --}}
<script src="https://korablobstorage.blob.core.windows.net/modal-bucket/korapay-collections.min.js"></script>

@push('scripts')
<script>
    // This function will be called when the Place Order button is clicked.
    function payWithKoraPay() {
        // Get cart details passed from PHP
        let cart = @json(Webkul\Checkout\Facades\Cart::getCart());

        // Get KoraPay config from PHP
        let publicKey = "{{ core()->getConfigData('sales.payment_methods.korapay.public_key') }}";
        let reference = 'BAGISTO-' + cart.id + '-' + new Date().getTime(); // Generate a unique reference

        window.Korapay.initialize({
            key: publicKey,
            reference: reference, // Your unique transaction reference
            amount: cart.grand_total,
            currency: cart.cart_currency_code,
            customer: {
                name: cart.billing_address.first_name + ' ' + cart.billing_address.last_name,
                email: cart.billing_address.email
            },
            notification_url: "{{ route('korapay.webhook') }}", // The server-side confirmation URL
            narration: 'Payment for Order ' + cart.id,

            // --- Callbacks ---
            onSuccess: function (data) {
                // This function is called when the payment modal reports success.
                // IMPORTANT: This is NOT the final confirmation.
                // We now create a 'pending' order via AJAX.
                showPlaceOrderLoading(); // Show a loading spinner

                fetch("{{ route('korapay.save-order') }}", {
                    method: 'POST',
                    body: JSON.stringify({
                        _token: "{{ csrf_token() }}",
                        reference: data.reference, // Use the reference KoraPay gives back
                    }),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8",
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.json())
                .then(json => {
                    if (json.success) {
                        // Redirect to the Bagisto success page. The order is still 'pending'.
                        window.location.href = json.redirect_url;
                    } else {
                        // Handle error if the order couldn't be saved
                        alert(json.message || 'There was an issue placing your order. Please contact support.');
                        hidePlaceOrderLoading();
                    }
                });
            },
            onFailed: function (data) {
                // Handle when payment fails
                alert('The payment failed. Please try again.');
            },
            onClose: function () {
                // Handle when the modal is closed by the user
                // Re-enable the "Place Order" button if it was disabled
                hidePlaceOrderLoading();
            }
        });
    }

    // This function hijacks the "Place Order" button's default behavior
    document.addEventListener('DOMContentLoaded', function() {
        let paymentMethod = document.querySelector('input[name="payment[method]"]:checked');

        // This is the main "Place Order" button in the Bagisto theme
        let placeOrderButton = document.getElementById('place-order-button');
        if (!placeOrderButton) return;

        // Store the original click handler
        let originalClickHandler = placeOrderButton.onclick;

        function checkPaymentMethod() {
            let selectedMethod = document.querySelector('input[name="payment[method]"]:checked').value;
            if (selectedMethod === 'korapay') {
                placeOrderButton.onclick = function(event) {
                    event.preventDefault(); // Stop the form from submitting
                    payWithKoraPay();       // Call our function instead
                };
            } else {
                // If another payment method is selected, restore the original behavior
                placeOrderButton.onclick = originalClickHandler;
            }
        }

        // Listen for changes on payment method radio buttons
        document.querySelectorAll('input[name="payment[method]"]').forEach(radio => {
            radio.addEventListener('change', checkPaymentMethod);
        });

        // Initial check when the page loads
        checkPaymentMethod();
    });

    // Helper functions for loading spinner on the button
    function showPlaceOrderLoading() {
        let placeOrderButton = document.getElementById('place-order-button');
        if (placeOrderButton) {
            placeOrderButton.classList.add('disabled');
            placeOrderButton.setAttribute('disabled', 'disabled');
            // You can add spinner HTML inside the button here if you want
        }
    }
    function hidePlaceOrderLoading() {
        let placeOrderButton = document.getElementById('place-order-button');
        if (placeOrderButton) {
            placeOrderButton.classList.remove('disabled');
            placeOrderButton.removeAttribute('disabled');
        }
    }

</script>
@endpush