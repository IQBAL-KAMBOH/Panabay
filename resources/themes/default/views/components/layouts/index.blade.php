@props([
'hasHeader' => true,
'hasFeature' => true,
'hasFooter' => true,
])

<!DOCTYPE html>

<html
    lang="{{ app()->getLocale() }}"
    dir="{{ core()->getCurrentLocale()->direction }}">

<head>

    {!! view_render_event('bagisto.shop.layout.head.before') !!}

    <title>{{ $title ?? '' }}</title>

    <meta charset="UTF-8">

    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta
        http-equiv="content-language"
        content="{{ app()->getLocale() }}">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">
    <meta
        name="base-url"
        content="{{ url()->to('/') }}">
    <meta
        name="currency"
        content="{{ core()->getCurrentCurrency()->toJson() }}">

    @stack('meta')

    <link
        rel="icon"
        sizes="16x16"
        href="{{ core()->getCurrentChannel()->favicon_url ?? bagisto_asset('images/favicon.ico') }}" />

    @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])

    <link
        rel="preload"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        as="style">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">

    <link
        rel="preload"
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap"
        as="style">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('styles')

    <style>
        {
            ! ! core()->getConfigData('general.content.custom_scripts.custom_css') ! !
        }
    </style>

    @if(core()->getConfigData('general.content.speculation_rules.enabled'))
    <script type="speculationrules">
        @json(core()->getSpeculationRules(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            </script>
    @endif

    {!! view_render_event('bagisto.shop.layout.head.after') !!}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    {!! view_render_event('bagisto.shop.layout.body.before') !!}

    <a
        href="#main"
        class="skip-to-main-content-link">
        Skip to main content
    </a>

    <div id="app">
        <!-- Flash Message Blade Component -->
        <x-shop::flash-group />

        <!-- Confirm Modal Blade Component -->
        <x-shop::modal.confirm />

        <!-- Page Header Blade Component -->
        @if ($hasHeader)
        <x-shop::layouts.header />
        @endif

        @if(
        core()->getConfigData('general.gdpr.settings.enabled')
        && core()->getConfigData('general.gdpr.cookie.enabled')
        )
        <x-shop::layouts.cookie />
        @endif

        {!! view_render_event('bagisto.shop.layout.content.before') !!}

        <!-- Page Content Blade Component -->
        <main id="main" class="bg-white">
            {{ $slot }}
        </main>

        {!! view_render_event('bagisto.shop.layout.content.after') !!}


        <!-- Page Services Blade Component -->
        @if ($hasFeature)
        <x-shop::layouts.services />
        @endif

        <!-- Page Footer Blade Component -->
        @if ($hasFooter)
        <x-shop::layouts.footer />
        @endif
    </div>

    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    @stack('scripts')

    {!! view_render_event('bagisto.shop.layout.vue-app-mount.before') !!}
    <script>
        /**
         * Load event, the purpose of using the event is to mount the application
         * after all of our `Vue` components which is present in blade file have
         * been registered in the app. No matter what `app.mount()` should be
         * called in the last.
         */
        window.addEventListener("load", function(event) {
            app.mount("#app");
        });
    </script>

    {!! view_render_event('bagisto.shop.layout.vue-app-mount.after') !!}

    <script type="text/javascript">
        {
            !!core() - > getConfigData('general.content.custom_scripts.custom_javascript') !!
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            const apiUrl = 'https://ipwhois.app/json/';



            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // Check if the API call was successful
                    if (data && data.success) {
                        // Find the elements by their IDs
                        const flagElement = document.getElementById('user-flag');
                        const countryCodeElement = document.getElementById('user-country-code');
                        const currencyElement = document.getElementById('user-currency');
                        console.log(data);
                        // 1. Update the Flag Image
                        if (flagElement) {
                            flagElement.src = data.country_flag; // Use the direct image URL from the API
                            flagElement.alt = "Flag of " + data.country; // Set alt text for accessibility
                        }

                        // 2. Update the Country Code Text
                        if (countryCodeElement) {
                            countryCodeElement.textContent = data.country_code;
                        }

                        // 3. Update the Currency using our map
                        if (currencyElement) {

                            currencyElement.textContent = data.currency_code;
                        }

                    } else {
                        console.error('Failed to retrieve location data from ipwhois.io');
                    }
                })
                .catch(error => {
                    console.error('Error fetching user location:', error);
                });
        });
    </script>

            <script>
                // --- SLIDER JAVASCRIPT ---
                document.addEventListener('DOMContentLoaded', () => {
                    // Select all the necessary elements from the DOM
                    const wrapper = document.querySelector('.slider-wrapper');
                    const slides = document.querySelectorAll('.slide');
                    const prevBtn = document.getElementById('prev-btn');
                    const nextBtn = document.getElementById('next-btn');
                    const dotsContainer = document.querySelector('.slider-dots');

                    // Check if slider elements exist before running the script
                    if (!wrapper || !slides.length) {
                        return;
                    }

                    let currentIndex = 0;
                    const totalSlides = slides.length;

                    // --- Create Navigation Dots ---
                    for (let i = 0; i < totalSlides; i++) {
                        const dot = document.createElement('span');
                        dot.classList.add('dot');
                        dot.dataset.index = i; // Store index to know which slide to go to
                        dotsContainer.appendChild(dot);
                    }
                    const dots = document.querySelectorAll('.dot');


                    // --- Core Function to Move Slider to a Specific Slide ---
                    function goToSlide(index) {
                        // Loop the slider: if it goes past the end, go to start, and vice-versa
                        if (index < 0) {
                            index = totalSlides - 1;
                        } else if (index >= totalSlides) {
                            index = 0;
                        }

                        // Move the wrapper using CSS transform
                        wrapper.style.transform = `translateX(-${index * 100}%)`;
                        currentIndex = index;

                        // Update which dot is shown as "active"
                        updateDots();
                    }

                    // --- Function to Highlight the Active Dot ---
                    function updateDots() {
                        dots.forEach(dot => {
                            dot.classList.remove('active');
                        });
                        dots[currentIndex].classList.add('active');
                    }


                    // --- Event Listeners for Buttons and Dots ---
                    nextBtn.addEventListener('click', () => {
                        goToSlide(currentIndex + 1);
                    });

                    prevBtn.addEventListener('click', () => {
                        goToSlide(currentIndex - 1);
                    });

                    dots.forEach(dot => {
                        dot.addEventListener('click', (e) => {
                            // Get the index from the dot's data attribute and go to that slide
                            const index = parseInt(e.target.dataset.index);
                            goToSlide(index);
                        });
                    });


                    // --- Autoplay Functionality (Optional) ---
                    let autoplayInterval = setInterval(() => {
                        goToSlide(currentIndex + 1);
                    }, 5000); // Change slide every 5 seconds (5000ms)

                    // Pause autoplay on hover for better user experience
                    const sliderContainer = document.querySelector('.slider-container');
                    sliderContainer.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
                    sliderContainer.addEventListener('mouseleave', () => {
                        // Resume autoplay when the mouse leaves
                        autoplayInterval = setInterval(() => {
                            goToSlide(currentIndex + 1);
                        }, 5000);
                    });


                    // --- Initialize the slider ---
                    goToSlide(0); // Start at the first slide
                });
            </script>
</body>

</html>