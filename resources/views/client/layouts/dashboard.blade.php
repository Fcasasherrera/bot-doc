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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Bot-Doc | @yield('title')</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"
        integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')
</body>

</html>
