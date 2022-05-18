<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="icon" href="/images/fav.ico" type="image/x-icon">
    <link href="{{ asset('css/client/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" v-scroll="scrollFunction">
        <div class="min-h-screen bg-white w-full">
            @include('client.layouts.navbarDash')
            <div class="min-h-screen w-full bg-white flex">
                @include('client.layouts.sidebar')
                <main class="w-full p-4">
                    @yield('content')
                </main>
            </div>
            @include('client.layouts.footerDash')
        </div>
    </div>
    <script async src="{{ asset('js/app.js') }}"></script>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')
</body>

</html>
