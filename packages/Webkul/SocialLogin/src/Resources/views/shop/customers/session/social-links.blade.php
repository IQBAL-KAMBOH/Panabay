@php
    // We define our social providers here with their icon SVG and Tailwind CSS classes.
    // This makes the template cleaner and easier to manage.


    $socials = [
        'facebook' => [
            'route'   => 'facebook',
            'label'   => 'Facebook',
            'class'   => 'hover:bg-[#1877F2] hover:border-[#1877F2]',
            'icon'    => '<svg class="h-6 w-6 text-[#0000FF]" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.24 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v7.029C18.343 21.128 22 16.991 22 12z" fill="#0000FF"></path></svg>',
        ],
        'twitter' => [
            'route'   => 'twitter',
            'label'   => 'Twitter',
            'class'   => 'hover:bg-[#1877F2] hover:border-[#1877F2]',
            'icon'    => '<svg class="h-5 w-5 text-black" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>',
        ],
        'google' => [
            'route'   => 'google',
            'label'   => 'Google',
            'class'   => 'hover:bg-[#4285F4] hover:border-[#4285F4]',
            'icon'    => '<svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 1.99 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>',
        ],

    ];
@endphp


<div class="flex justify-center gap-4 mt-4">
    @foreach ($socials as $name => $social)
        @if (core()->getConfigData('customer.settings.social_login.enable_' . str_replace('-openid', '', $name)))
            <a
                href="{{ route('customer.social-login.index', $social['route']) }}"
                class="flex items-center justify-center w-12 h-12 border-2 rounded  {{ $social['class'] }}  transition-all duration-300 transform hover:scale-110"
                aria-label="Login with {{ $social['label'] }}"
                title="Login with {{ $social['label'] }}"
            >
                {!! $social['icon'] !!}
            </a>
        @endif
    @endforeach
</div>