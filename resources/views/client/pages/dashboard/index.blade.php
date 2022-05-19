@extends('client.layouts.dashboard')
@section('title')
    Inicio
@endsection
@section('content')
    <div class="flex space-x-2 space-y-2">
        <div class="w-1/3 animated fadeIn">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Line chart</div>
                <canvas class="p-10" id="chartLine"></canvas>
            </div>
        </div>
        <div class="w-1/3 animated fadeIn delay-1s">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Line chart</div>
                <canvas class="p-10" id="chartLine2"></canvas>
            </div>
        </div>
        <div class="w-1/3 animated fadeIn delay-2s">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Line chart</div>
                <canvas class="p-10" id="chartLine3"></canvas>
            </div>
        </div>
    </div>
    <div class="welcome-quote">
        <blockquote>
            Happiness is not something readymade. It comes from your own actions.
            <cite>
                Dalai Lama
            </cite>
        </blockquote>
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->

    @include('client.components.modal-register')
    @include('client.components.modal-login')
@endsection
@section('scripts')
    <!-- Chart line -->
    <script>
        const labels = ["January", "February", "March", "April", "May", "June"];
        const data = {
            labels: labels,
            datasets: [{
                label: "My First dataset",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [0, 10, 5, 2, 20, 30, 45],
            }, ],
        };

        const configLineChart = {
            type: "line",
            data,
            options: {},
        };

        var chartLine = new Chart(
            document.getElementById("chartLine"),
            configLineChart
        );
        var chartLine = new Chart(
            document.getElementById("chartLine2"),
            configLineChart
        );
        var chartLine = new Chart(
            document.getElementById("chartLine3"),
            configLineChart
        );
    </script>
@endsection
