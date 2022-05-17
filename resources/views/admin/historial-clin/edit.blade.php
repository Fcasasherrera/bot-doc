@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.historial-clin.actions.edit', ['name' => $historialClin->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <historial-clin-form
                :action="'{{ $historialClin->resource_url }}'"
                :data="{{ $historialClin->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.historial-clin.actions.edit', ['name' => $historialClin->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.historial-clin.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </historial-clin-form>

        </div>
    
</div>

@endsection