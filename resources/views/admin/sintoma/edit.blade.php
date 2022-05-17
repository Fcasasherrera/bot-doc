@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.sintoma.actions.edit', ['name' => $sintoma->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <sintoma-form
                :action="'{{ $sintoma->resource_url }}'"
                :data="{{ $sintoma->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.sintoma.actions.edit', ['name' => $sintoma->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.sintoma.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </sintoma-form>

        </div>
    
</div>

@endsection