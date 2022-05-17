@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.sig-enf.actions.edit', ['name' => $sigEnf->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <sig-enf-form
                :action="'{{ $sigEnf->resource_url }}'"
                :data="{{ $sigEnf->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.sig-enf.actions.edit', ['name' => $sigEnf->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.sig-enf.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </sig-enf-form>

        </div>
    
</div>

@endsection