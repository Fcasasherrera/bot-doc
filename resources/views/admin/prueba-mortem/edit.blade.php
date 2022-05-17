@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.prueba-mortem.actions.edit', ['name' => $pruebaMortem->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <prueba-mortem-form
                :action="'{{ $pruebaMortem->resource_url }}'"
                :data="{{ $pruebaMortem->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.prueba-mortem.actions.edit', ['name' => $pruebaMortem->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.prueba-mortem.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </prueba-mortem-form>

        </div>
    
</div>

@endsection