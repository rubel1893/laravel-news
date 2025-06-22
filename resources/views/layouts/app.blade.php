<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Laravel App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased">
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            @php
           $logo = \App\Models\Setting::first()?->site_logo;
           @endphp

           <a href="{{ route('home') }}">
           @if ($logo)
           <img src="{{ asset('storage/' . $logo) }}" alt="Site Logo" class="h-10">
           @else
           <span class="text-white font-bold text-lg">Laravel</span>
            @endif
           </a>

         
            <!-- Navigation Links -->
           <div class="flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-gray-300">Home</a>
                <a href="{{ route('blogs') }}" class="hover:text-gray-300">Blogs</a>
                <a href="{{ route('about') }}" class="hover:text-gray-300">About</a>
                <a href="{{ route('contact') }}" class="hover:text-gray-300">Contact</a>

            </div>
        </div>
    </nav>

    {{ $slot ?? '' }}

    @yield('content')

    <footer class="bg-gray-900 text-white p-6 mt-12">
    @php
        $settings = \App\Models\Setting::first();
    @endphp

    <div class="container mx-auto text-center space-y-2">
        <p>{{ $settings->footer_text ?? '© ' . date('Y') . ' Laravel News. All rights reserved.' }}</p>
        <div class="flex justify-center space-x-4">
            @if($settings->facebook_url)
                <a href="{{ $settings->facebook_url }}" target="_blank" class="hover:text-gray-400">Facebook</a>
            @endif
            @if($settings->twitter_url)
                <a href="{{ $settings->twitter_url }}" target="_blank" class="hover:text-gray-400">Twitter</a>
            @endif
            @if($settings->instagram_url)
                <a href="{{ $settings->instagram_url }}" target="_blank" class="hover:text-gray-400">Instagram</a>
            @endif
        </div>
    </div>
</footer>

</body>
</html>
