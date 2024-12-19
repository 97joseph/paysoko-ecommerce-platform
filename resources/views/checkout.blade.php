<x-app-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
        <style>
            /* Loader Styles */
            #loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.9);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                font-size: 1.5rem;
                font-weight: bold;
                color: #333;
            }
            #loader.hidden {
                display: none;
            }
        </style>
    </x-slot>

    <x-slot name="js">
        <script src="{{ asset('js/checkout.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('form');
                const loader = document.getElementById('loader');

                // Submit form and generate PDF via a hidden iframe
                form.addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent default form submission behavior

                    // Show loader
                    loader.classList.remove('hidden');
                    loader.innerHTML = 'Your Order is Being Processed...';

                    // Create a hidden iframe for form submission
                    const iframe = document.createElement('iframe');
                    iframe.style.display = 'none';
                    document.body.appendChild(iframe);

                    // Clone the form and submit it via the iframe
                    const iframeDoc = iframe.contentWindow.document;
                    const clonedForm = form.cloneNode(true);
                    iframeDoc.body.appendChild(clonedForm);

                    clonedForm.submit();

                    // Hide loader and clean up iframe after a short delay
                    setTimeout(() => {
                        loader.innerHTML = 'Downloading your PDF...';
                        setTimeout(() => {
                            loader.classList.add('hidden');
                            document.body.removeChild(iframe);
                        }, 3000);
                    }, 2000);
                });
            });
        </script>
    </x-slot>

    <!-- Loader -->
    <div id="loader" class="hidden">Your Order is Being Processed...</div>

    <main class="_container">
        <div class="checkout_order">
            <div class="checkout">
                <h1>Checkout</h1>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p style="color: red">{{ $error }}</p>
                    @endforeach
                @else
                    <strong style="cursor: pointer;" onclick="fillForm(this)">Fill My Details -></strong>
                @endif
                <form action="{{ route('checkout') }}" method="post" target="_blank">
                    @csrf
                    <h2>Billing Details</h2>
                    <div class="form_group">
                        <label for="first_name">First Name</label>
                        <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="form_group">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                    <div class="form_group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form_group">
                        <label for="address">Address Line</label>
                        <input id="address" type="text" name="address_line" value="{{ old('address_line') }}" required>
                    </div>
                    <div class="two_form">
                        <div class="form_group">
                            <label for="city">City</label>
                            <input id="city" type="text" name="city" value="{{ old('city') }}" required>
                        </div>
                        <div class="form_group">
                            <label for="postal_code">Postal Code</label>
                            <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code') }}" required>
                        </div>
                    </div>
                    <div class="two_form">
                        <div class="form_group">
                            <label for="country">Country</label>
                            <input id="country" type="text" name="country" value="{{ old('country') }}" required>
                        </div>
                        <div class="form_group">
                            <label for="mobile">Mobile No.</label>
                            <input id="mobile" type="text" name="mobile" value="{{ old('mobile') }}" required>
                        </div>
                    </div>
                    <h2>Payment Details</h2>
                    <input type="checkbox" name="cod" value="1" id="cod">
                    <label for="cod">Cash On Delivery</label>

                    <button type="submit">Order Now</button>
                </form>
            </div>
            <div class="order">
                <div class="card">
                    <h2>Your Order</h2>
                    <div class="flex_align">
                        <strong>Sub Total</strong>
                        <span>${{ $subTotal }}</span>
                    </div>
                    <div class="flex_align">
                        <strong>Discount</strong>
                        <span>$0</span>
                    </div>
                    <div class="flex_align">
                        <strong>Tax</strong>
                        <span>$0</span>
                    </div>
                    <div class="flex_align">
                        <strong>Shipping Cost</strong>
                        <span>$0</span>
                    </div>
                    <div class="flex_align">
                        <h3>Total Cost</h3>
                        <h3>${{ $subTotal }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
