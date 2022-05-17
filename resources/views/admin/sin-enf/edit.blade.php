@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.sin-enf.actions.edit', ['name' => $sinEnf->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <sin-enf-form
                :action="'{{ $sinEnf->resource_url }}'"
                :data="{{ $sinEnf->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.sin-enf.actions.edit', ['name' => $sinEnf->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.sin-enf.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </sin-enf-form>

        </div>
    
</div>

@endsection