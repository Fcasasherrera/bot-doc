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
        <div class="min-h-screen bg-white">
            @include('client.layouts.navbar')
            <main>
                @yield('content')
                @include('client.layouts.footer')
            </main>
        </div>
    </div>
    <script async src="{{ asset('js/app.js') }}"></script>
    <script>
        function registerModal() {
            let modalRegister = document.getElementById("modalRegister");
            if (modalRegister.classList.contains("hidden")) {
                modalRegister.classList.remove("hidden");
                modalRegister.classList.add("flex");
            } else {
                modalRegister.classList.remove("flex");
                modalRegister.classList.add("hidden");
            }
        }

        function loginModal() {
            let modalRegister = document.getElementById("modalLogin");
            if (modalRegister.classList.contains("hidden")) {
                modalRegister.classList.remove("hidden");
                modalRegister.classList.add("flex");
            } else {
                modalRegister.classList.remove("flex");
                modalRegister.classList.add("hidden");
            }
        }
    </script>
</body>

</html>
