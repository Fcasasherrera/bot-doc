@extends('client.layouts.dashboard')
@section('title')
    Consultas
@endsection
@section('content')
    <h1 class="p-3 ml-2 text-xl text-primary font-bold uppercase">Consulta médica</h1>
    <div class="flex space-x-2 space-y-2 animated fadeIn">
        <div class="w-full shadow rounded">
            <div class="p-2">
                <div class="flex justify-between items-center">
                    <span class="pl-3 text-md text-primary font-bold uppercase items-center">Consultas</span>
                    <a onclick="consultModal()" class="btn-primary mr-8 cursor-pointer">
                        Agregar
                    </a>
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
                                        IJDSK9922
                                    </th>
                                    <td class="px-6 py-4">
                                        Me diagnosticaron enferdad terminal pero creo que no
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
                        </tbody>
                    </table>
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

        async function getData() {
            let register = document.getElementById("register")
            let sintomas, signos, citas;
            try {
                sintomas = await axios.get('/api/sintomas')
                signos = await axios.get('/api/signos')
            } catch (error) {
                console.error(error);
            }
            let data = {
                sintomas: sintomas.data.data,
                signos: signos.data.data
            }
            var x = document.getElementById("sintomas");
            var y = document.getElementById("signos");
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
            //console.log(data);
        }

        function createCite() {
            let cites = document.getElementById("cites")
            let sintomas = $('#sintomas').val();
            let signos = $('#signos').val();
            let email = window.localStorage.getItem('email');
            let token = window.localStorage.getItem('token');
            let data = {
                sintoma1: sintomas[0],
                sintoma2: sintomas[1],
                sintoma3: sintomas[2],
                signo1: signos[0],
                signo2: signos[1],
                signo3: signos[2],
                detalles: cites.detalles.value,
                email,
                token,
            }

            console.log(data);
            axios.post('/api/citas', data)
                .then(function(response) {
                    console.log(response)
                    if (response.status) {
                        consultModal();
                        let listResult = document.getElementById("listResult");
                        let keys = Object.keys(response.data.data);
                        keys.map(item => {
                            var li = document.createElement("li");
                            listResult.appendChild(li);
                            let percent = response.data.data[item] * 10
                            li.innerHTML = item + ": " + percent + "%";
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
