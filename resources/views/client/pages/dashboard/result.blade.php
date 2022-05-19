@extends('client.layouts.dashboard')
@section('title')
    Resultados
@endsection
@section('content')
    <h1 class="p-3 ml-2 text-xl text-primary font-bold uppercase">Resultados médicos</h1>
    <div class="flex space-x-2 space-y-2 animated fadeIn">
        <div class="w-full shadow rounded">
            <div class="p-2">
                <div class="flex justify-between items-center">
                    <span class="pl-3 text-md text-primary font-bold uppercase items-center">Resultados</span>
                    {{-- <a onclick="consultModal()" class="btn-primary mr-8 cursor-pointer">
                        Agregar
                    </a> --}}
                </div>
                <hr class="mt-2 border-gray-200 sm:mx-auto dark:border-gray-700">
            </div>
            <div class="p-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id consulta
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Enfermedad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pruebas Laboratorio
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prueba Morten
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tratamiento
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultados as $resultado)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $resultado->idCita }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 dark:text-white whitespace-nowrap">
                                        {{ $resultado->created_at->format('Y-m-d') }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $resultado->enfermedad->nombre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <ul class="list-disc capitalize">
                                            <li>{{ $resultado->enfermedad->pruebalab }}</li>
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4">
                                        <ul class="list-disc capitalize">
                                            <li>{{ $resultado->enfermedad->pruebapostmortem }}</li>
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 capitalize">
                                        <li>{{ $resultado->enfermedad->tratamiento }}</li>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-8 py-2">
                        {{ $resultados->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script></script>
@endsection
