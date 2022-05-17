@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.mor-enf.actions.edit', ['name' => $morEnf->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <mor-enf-form
                :action="'{{ $morEnf->resource_url }}'"
                :data="{{ $morEnf->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.mor-enf.actions.edit', ['name' => $morEnf->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.mor-enf.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </mor-enf-form>

        </div>
    
</div>

@endsection