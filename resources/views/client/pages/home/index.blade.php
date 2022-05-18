@extends('client.layouts.master')

@section('content')
    @include('client.components.hero')

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div
        class="flex justify-between items-center max-w-7xl mx-auto px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
        <div class="relative bg-white">
            <div class="h-56 bg-indigo-600 sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2 rounded-xl">
                <img class="w-full h-full object-cover rounded-xl" src="/images/hero-2.jpeg" alt="Support team">
            </div>
            <div class="relative max-w-7xl mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16">
                <div class="max-w-2xl mx-auto lg:max-w-none lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-10">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                            <!-- Heroicon name: outline/users -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <span class="shadow rounded p-3 ml-2 text-md text-primary font-bold uppercase">
                            Acerca de nosotros
                        </span>
                    </div>
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Nos encanta trabajar con nuestros clientes
                    </h2>
                    <p class="mt-6 text-lg text-gray-500">
                        Bot-doc es el minorista especializado en servicios medicos más grande de México y
                        soluciones para las necesidades de por vida de nuestros pacientes. En Bot-doc,
                        amamos lo que hacemos y creemos en nuestros resultados.
                    </p>
                    <div class="mt-8 overflow-hidden">
                        <dl class="-mx-8 -mt-8 flex flex-wrap">
                            <div class="flex flex-col px-8 pt-8">
                                <dt class="order-2 text-base font-medium text-gray-500">
                                    Servicio
                                </dt>
                                <dd class="order-1 text-2xl font-extrabold text-primary sm:text-3xl">
                                    24/7
                                </dd>
                            </div>
                            <div class="flex flex-col px-8 pt-8">
                                <dt class="order-2 text-base font-medium text-gray-500">
                                    Personal Calificado
                                </dt>
                                <dd class="order-1 text-2xl font-extrabold text-primary sm:text-3xl">
                                    100%
                                </dd>
                            </div>
                            <div class="flex flex-col px-8 pt-8">
                                <dt class="order-2 text-base font-medium text-gray-500">
                                    Mejores Doctores
                                </dt>
                                <dd class="order-1 text-2xl font-extrabold text-primary sm:text-3xl">
                                    100k+
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-between items-center w-full md:justify-start md:space-x-10">
        <div class="relative w-full mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16 bg-gradient justify-center text-center">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                Registrate Ahora.!
            </h2>
            <a href="#" class="btn-primary mt-8">
                Registrarse
            </a>
        </div>
    </div>

    <footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-800">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://bot-doc.sw" class="flex items-center mb-4 sm:mb-0">
                <img src="/images/logo.png" class="mr-3 h-8" alt="Flowbite Logo">
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com"
                class="hover:underline">Bot-doc™</a>. All Rights Reserved.
        </span>
    </footer>
@endsection
