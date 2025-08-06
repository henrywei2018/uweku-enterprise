<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title', 'Home')</title>

    {{-- Search Engine Indexing Control --}}
    @php
    $generalSettings = app(\App\Settings\GeneralSettings::class);
    $allowIndexing = $generalSettings->search_engine_indexing ?? false;
    @endphp

    @if(!$allowIndexing)
    <meta name="robots" content="noindex, nofollow">
    @endif

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/unicons/unicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/yellow.css') }}">
    <link rel="preload" href="{{ asset('assets/css/fonts/urbanist.css') }}" as="style" onload="this.rel='stylesheet'">
    <style>
        @media (min-width: 992px) {
            .navbar-nav>.nav-item>.nav-link {
                position: relative;
            }

            .navbar-nav>.nav-item+.nav-item>.nav-link:before {
                content: "";
                display: block;
                position: absolute;
                width: 3px;
                height: 3px;
                top: 50%;
                left: -2px;
                background: rgba(0, 0, 0, 0.25);
                border-radius: 50%;
            }
        }

        .filter:not(.basic-filter) ul li a.active,
        .filter:not(.basic-filter) ul li a:hover,
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link.show {
            color: #fab758 !important;
        }

        .navbar-stick:not(.navbar-dark) {
            box-shadow: 0 0 1.25rem rgba(30, 34, 40, .06) !important;
            background: rgba(255, 255, 255, .97) !important;
        }

        .card {
            display: flex;
            flex-direction: column;
            border-radius: 0.375rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 2rem rgba(30, 34, 40, 0.15) !important;
        }

        /* Ensure images cover their container completely without distortion */
        .object-cover {
            object-fit: cover;
            object-position: center;
        }

        /* Clean white text box underneath */
        .card-body {
            background: white;
            padding: 1rem;
            border-bottom-left-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }
    </style>
    @livewireStyles
</head>

<body>
    <div class="grow shrink-0">
        <!-- Header -->
        
        @livewire('frontend.header')
        <!-- Main Content -->
        {{ $slot }}

        <!-- Footer -->
        @livewire('frontend.footer')
    </div>

    <!-- progress wrapper -->
    <div id="simple-chat-button--container">
        <a href="https://wa.me/1234567890?text=Hello%2C%20I%20would%20like%20to%20discuss%20something."
            target="_blank"
            id="simple-chat-button--button"
            aria-label="Chat on WhatsApp">
        </a>
        <span id="simple-chat-button--text">Chat with us</span>
    </div>

    <style>
        #simple-chat-button--container {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 999999999;
        }

        #simple-chat-button--button {
            display: block;
            position: relative;
            text-decoration: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            transition: all 0.2s ease-in-out;
            transform: scale(1);
            box-shadow: 0 6px 8px 2px rgba(0, 0, 0, .15);
            background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjU2IiB3aWR0aD0iMjU2IiB2aWV3Qm94PSItMjMgLTIxIDY4MiA2ODIuNjY3IiBmaWxsPSIjZmZmIiB4bWxuczp2PSJodHRwczovL3ZlY3RhLmlvL25hbm8iPjxwYXRoIGQ9Ik01NDQuMzg3IDkzLjAwOEM0ODQuNTEyIDMzLjA2MyA0MDQuODgzLjAzNSAzMjAuMDUxIDAgMTQ1LjI0NiAwIDIuOTggMTQyLjI2MiAyLjkxIDMxNy4xMTNjLS4wMjMgNTUuODk1IDE0LjU3OCAxMTAuNDU3IDQyLjMzMiAxNTguNTUxTC4yNSA2NDBsMTY4LjEyMS00NC4xMDJjNDYuMzI0IDI1LjI3IDk4LjQ3NyAzOC41ODYgMTUxLjU1MSAzOC42MDJoLjEzM2MxNzQuNzg1IDAgMzE3LjA2Ni0xNDIuMjczIDMxNy4xMzMtMzE3LjEzMy4wMzUtODQuNzQyLTMyLjkyMi0xNjQuNDE4LTkyLjgwMS0yMjQuMzU5ek0zMjAuMDUxIDU4MC45NDFoLS4xMDljLTQ3LjI5Ny0uMDItOTMuNjg0LTEyLjczLTEzNC4xNi0zNi43NDJsLTkuNjIxLTUuNzE1LTk5Ljc2NiAyNi4xNzIgMjYuNjI5LTk3LjI3LTYuMjctOS45NzNjLTI2LjM4Ny00MS45NjktNDAuMzItOTAuNDc3LTQwLjI5Ny0xNDAuMjgxLjA1NS0xNDUuMzMyIDExOC4zMDUtMjYzLjU3IDI2My42OTktMjYzLjU3IDcwLjQwNi4wMjMgMTM2LjU5IDI3LjQ3NyAxODYuMzU1IDc3LjMwMXM3Ny4xNTYgMTE2LjA1MSA3Ny4xMzMgMTg2LjQ4NGMtLjA2MiAxNDUuMzQ0LTExOC4zMDUgMjYzLjU5NC0yNjMuNTk0IDI2My41OTR6bTE0NC41ODYtMTk3LjQxOGMtNy45MjItMy45NjktNDYuODgzLTIzLjEzMy01NC4xNDgtMjUuNzgxLTcuMjU4LTIuNjQ1LTEyLjU0Ny0zLjk2MS0xNy44MjQgMy45NjktNS4yODUgNy45My0yMC40NjkgMjUuNzgxLTI1LjA5NCAzMS4wNjZzLTkuMjQyIDUuOTUzLTE3LjE2OCAxLjk4NC0zMy40NTctMTIuMzM2LTYzLjcyNy0zOS4zMzJjLTIzLjU1NS0yMS4wMTItMzkuNDU3LTQ2Ljk2MS00NC4wODItNTQuODkxLTQuNjE3LTcuOTM3LS4wMzktMTEuODEyIDMuNDc3LTE2LjE3MiA4LjU3OC0xMC42NTIgMTcuMTY4LTIxLjgyIDE5LjgwOS0yNy4xMDVzMS4zMi05LjkxOC0uNjY0LTEzLjg4M2MtMS45NzctMy45NjUtMTcuODI0LTQyLjk2OS0yNC40MjYtNTguODQtNi40MzctMTUuNDQ1LTEyLjk2NS0xMy4zNTktMTcuODMyLTEzLjYwMi00LjYxNy0uMjMtOS45MDItLjI3Ny0xNS4xODctLjI3N3MtMTMuODY3IDEuOTgtMjEuMTMzIDkuOTE4LTI3LjczIDI3LjEwMi0yNy43MyA2Ni4xMDUgMjguMzk1IDc2LjY4NCAzMi4zNTUgODEuOTczIDU1Ljg3OSA4NS4zMjggMTM1LjM2NyAxMTkuNjQ4YzE4LjkwNiA4LjE3MiAzMy42NjQgMTMuMDQzIDQ1LjE3NiAxNi42OTUgMTguOTg0IDYuMDMxIDM2LjI1NCA1LjE4IDQ5LjkxIDMuMTQxIDE1LjIyNy0yLjI3NyA0Ni44NzktMTkuMTcyIDUzLjQ4OC0zNy42OCA2LjYwMi0xOC41MTIgNi42MDItMzQuMzc1IDQuNjE3LTM3LjY4NC0xLjk3Ny0zLjMwNS03LjI2Mi01LjI4NS0xNS4xODQtOS4yNTR6bTAgMCIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+") center/44px 44px no-repeat #25D366;
        }

        #simple-chat-button--text {
            display: block;
            position: absolute;
            width: max-content;
            background-color: #fff;
            bottom: 15px;
            left: 70px;
            border-radius: 5px;
            padding: 5px 10px;
            color: #000;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: -0.03em;
            user-select: none;
            word-break: keep-all;
            line-height: 1em;
            text-overflow: ellipsis;
            vertical-align: middle;
            box-shadow: 0 6px 8px 2px rgba(0, 0, 0, .15);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        #simple-chat-button--button:before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            border-radius: 50%;
            animation: scb-shockwave-animation 2s 5.3s ease-out infinite;
            z-index: -1;
        }

        #simple-chat-button--button:hover {
            transform: scale(1.06);
            transition: all 0.2s ease-in-out;
        }

        #simple-chat-button--container:hover #simple-chat-button--text {
            opacity: 1;
        }

        @keyframes scb-shockwave-animation {
            0% {
                transform: scale(1);
                box-shadow: 0 0 2px rgba(0, 100, 0, .5), inset 0 0 1px rgba(0, 100, 0, .5);
            }

            95% {
                box-shadow: 0 0 50px transparent, inset 0 0 30px transparent;
            }

            100% {
                transform: scale(1.2);
            }
        }

        @media only screen and (max-width: 1024px) {
            #simple-chat-button--container {
                bottom: 20px;
            }
        }

        @media only screen and (max-width: 768px) {
            #simple-chat-button--container {
                bottom: 20px;
            }
        }
    </style>

    <!-- Optional: Add some custom styles -->


    @livewireScripts
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    @stack('scripts')

</body>

</html>