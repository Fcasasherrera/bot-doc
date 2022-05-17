<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.enfermedad.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.enfermedad.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descEnf'), 'has-success': fields.descEnf && fields.descEnf.valid }">
    <label for="descEnf" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.enfermedad.columns.descEnf') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descEnf" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descEnf'), 'form-control-success': fields.descEnf && fields.descEnf.valid}" id="descEnf" name="descEnf" placeholder="{{ trans('admin.enfermedad.columns.descEnf') }}">
        <div v-if="errors.has('descEnf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descEnf') }}</div>
    </div>
</div>


