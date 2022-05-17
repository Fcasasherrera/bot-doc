@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.diagnostico.actions.edit', ['name' => $diagnostico->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <diagnostico-form
                :action="'{{ $diagnostico->resource_url }}'"
                :data="{{ $diagnostico->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.diagnostico.actions.edit', ['name' => $diagnostico->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.diagnostico.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </diagnostico-form>

        </div>
    
</div>

@endsection