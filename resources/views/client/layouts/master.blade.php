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
    <title>Bot-Doc | @yield('title')</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"
        integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

        function makeid(length = 10) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }

        function register() {
            let register = document.getElementById("register")

            let data = {
                name: register.name.value,
                email: register.email.value,
                password: register.password.value,
                nss: register.nss.value,
                bornDate: register.bornDate.value,
                sex: register.sex.value,
            }
            console.log(data);
            axios.post('/api/register', data)
                .then(function(response) {
                    console.log(response)
                    if (response.data === 'MF200') {
                        window.localStorage.setItem('token', makeid());
                        window.localStorage.setItem('email', data.email);
                        window.location.href = "/dashboard";
                    } else if (response.data === 'MF004') {
                        alert("Este correo ya ha sido registrado")
                    }

                })
                .catch(function(error) {
                    console.log(error);
                })
        }

        function login() {
            let login = document.getElementById("login")
            let data = {
                email: login.email.value,
                password: login.password.value,
            }
            console.log(data);
            axios.post('/api/login', data)
                .then(function(response) {
                    console.log(response)
                    if (response.data === 'MF200') {
                        window.localStorage.setItem('token', makeid());
                        window.localStorage.setItem('email', data.email);
                        window.location.href = "/dashboard";
                    } else if (response.data === 'MF004') {
                        alert("Cuenta no encontrada")
                    } else if (response.data === 'MF003') {
                        alert("Contraseña incorrecta")
                    }

                })
                .catch(function(error) {
                    console.log(error);
                })
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
