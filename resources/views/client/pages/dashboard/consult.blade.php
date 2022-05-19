@extends('client.layouts.dashboard')
@section('title')
    Consultas
@endsection
@section('content')
    <h1 class="p-3 ml-2 text-xl text-primary font-bold uppercase">Consultas médicas</h1>
    <div class="flex space-x-2 space-y-2 animated fadeIn">
        <div class="w-full shadow rounded">
            <div class="p-2">
                <div class="flex justify-between items-center">
                    <span class="pl-3 text-md text-primary font-bold uppercase items-center">Consultas</span>
                    <div class="flex items-center">
                        <a onclick="consultModal()" class="btn-primary mr-8 cursor-pointer">
                            Agregar
                        </a>
                        @if ($flag)
                            <a href="/dashboard/medical-consult/todos/todos" class="btn-primary mr-8 cursor-pointer">
                                Borrar Filtros
                            </a>
                        @else
                            <a onclick="showFilters()" class="btn-primary mr-8 cursor-pointer">
                                Filtros
                            </a>
                        @endif
                    </div>
                </div>
                <div id="filters" class="hidden justify-end items-center w-full">
                    <div class="form-group" style="width: 30vh;">
                        <label for="sintomas" class="block text-gray-700 text-sm font-bold mb-2">
                            Sintomas
                        </label>
                        <select class="js-example-basic-single w-full form-control" name="sintomas[]" multiple="multiple"
                            id="sintomasF">
                        </select>
                    </div>
                    <div class="form-group" style="width: 30vh;">
                        <label for="signos" class="block text-gray-700 text-sm font-bold mb-2">
                            Signos
                        </label>
                        <select class="js-example-basic-single w-full form-control" name="signos[]" multiple="multiple"
                            id="signosF">
                        </select>
                    </div>
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
                                    Detalles
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sintomas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Signos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($citas as $cita)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        IJDSK22{{ $cita->id }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 dark:text-white whitespace-nowrap">
                                        {{ $cita->created_at->format('Y-m-d') }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $cita->detalles }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <ul class="list-disc">
                                            <li>{{ $cita->sintoma->nombre }}</li>
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4">
                                        <ul class="list-disc">
                                            <li>{{ $cita->signo->nombre }}</li>
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($citas->isEmpty())
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        Aun no tienes consultas con estas caracteristicas
                                    </th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="px-8 py-2">
                        {{ $citas->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    @include('client.components.modal-consult')
    @include('client.components.modal-result')
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                width: '100%',
                maximumSelectionSize: 3
            });
            getData()
        });
        $('#sintomasF').on('select2:select', function(e) {
            let sintomasF = $('#sintomasF').val();
            let signosF = $('#signosF').val();
            console.log(sintomasF, signosF)
            let url =
                `/dashboard/medical-consult/${sintomasF.length === 0 ? 'todos' : sintomasF[0]}/${signosF.length === 0 ? 'todos' : signosF[0]}`
            window.location.href = url
        });
        $('#signosF').on('select2:select', function(e) {
            let sintomasF = $('#sintomasF').val();
            let signosF = $('#signosF').val();
            let url =
                `/dashboard/medical-consult/${sintomasF.length === 0 ? 'todos' : sintomasF[0]}/${signosF.length === 0 ? 'todos' : signosF[0]}`
            window.location.href = url
        });

        async function getData() {
            let email = window.localStorage.getItem('email');
            let token = window.localStorage.getItem('token');
            if (!email || !token) {
                window.location.href = "/";
            }
            let sintomas, signos, citas;
            try {
                sintomas = await axios.get('/api/sintomas')
                signos = await axios.get('/api/signos')
                pruebas = await axios.get('/api/enfermedades')
            } catch (error) {
                console.error(error);
            }
            let data = {
                sintomas: sintomas.data.data,
                signos: signos.data.data,
                pruebas: pruebas.data.data
            }
            var x = document.getElementById("sintomas");
            var y = document.getElementById("signos");
            var sintomasF = document.getElementById("sintomasF");
            var signosF = document.getElementById("signosF");
            var z = document.getElementById("pruebas");
            data.sintomas.map(sintoma => {
                var option = document.createElement("option");
                option.value = sintoma.id;
                option.text = sintoma.nombre;
                x.add(option);
            })
            data.signos.map(signo => {
                var option = document.createElement("option");
                option.value = signo.id;
                option.text = signo.nombre;
                y.add(option);
            })
            data.sintomas.map(sintoma => {
                var option = document.createElement("option");
                option.value = sintoma.id;
                option.text = sintoma.nombre;
                sintomasF.add(option);
            })
            data.signos.map(signo => {
                var option = document.createElement("option");
                option.value = signo.id;
                option.text = signo.nombre;
                signosF.add(option);
            })
            data.pruebas.map(prueba => {
                var option = document.createElement("option");
                option.value = prueba.id;
                option.text = prueba.pruebalab;
                z.add(option);
            })
            //console.log(data);
        }

        function createCite() {

            let cites = document.getElementById("cites")
            let sintomas = $('#sintomas').val();
            let signos = $('#signos').val();
            let pruebas = $('#pruebas').val();
            console.log(pruebas)
            let email = window.localStorage.getItem('email');
            let token = window.localStorage.getItem('token');
            if (!email || !token) {
                window.location.href = "/";
            }
            if (sintomas.length === 0) {
                alert("agregue sintomas para continuar");
                return null;
            }
            if (cites.detalles.value === "") {
                alert("agregue detalles para continuar");
                return null;
            }
            let data = {
                sintomas: `${sintomas[0]}:${sintomas[1]}:${sintomas[2]}`,
                detalles: cites.detalles.value,
                email,
                token,
            }
            if (pruebas.length > 0) {
                data.pruebas_lab = `${pruebas[0]}`;
            }
            if (signos.length > 0) {
                data.signos = `${signos[0]}:${signos[1]}:${signos[2]}`;
            }
            axios.post('/api/citas', data)
                .then(function(response) {
                    if (response.status) {
                        let {
                            enfermedad,
                            tratamientos,
                            pruebas_labs,
                            pruebas_mortem
                        } = response.data[0];
                        consultModal();
                        let listResult = document.getElementById("listResult");
                        let keys = Object.keys(enfermedad);
                        keys.map(item => {
                            var li = document.createElement("li");
                            listResult.appendChild(li);
                            li.innerHTML = item + ": " + enfermedad[item] + "%";
                        })
                        resultModal();

                    }
                })
                .catch(function(error) {
                    console.log(error);
                })
        }


        function consultModal() {
            let modalRegister = document.getElementById("modalConsult");
            if (modalRegister.classList.contains("hidden")) {
                modalRegister.classList.remove("hidden");
                modalRegister.classList.add("flex");
            } else {
                modalRegister.classList.remove("flex");
                modalRegister.classList.add("hidden");
            }
        }

        function showFilters() {
            let filters = document.getElementById("filters");
            if (filters.classList.contains("hidden")) {
                filters.classList.remove("hidden");
                filters.classList.add("flex");
            } else {
                filters.classList.remove("flex");
                filters.classList.add("hidden");
            }
        }

        function resultModal() {
            let modalRegister = document.getElementById("modalResult");
            if (modalRegister.classList.contains("hidden")) {
                modalRegister.classList.remove("hidden");
                modalRegister.classList.add("flex");
            } else {
                modalRegister.classList.remove("flex");
                modalRegister.classList.add("hidden");
            }
        }
    </script>
@endsection
