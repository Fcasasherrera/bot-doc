@extends('client.layouts.dashboard')

@section('content')
    <div class="flex space-x-2 space-y-2">
        <h1 class="p-3 ml-2 text-xl text-primary font-bold uppercase">Consulta médica</h1>
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->

    @include('client.components.modal-register')
    @include('client.components.modal-login')
@endsection
@section('scripts')
@endsection
