<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tratamiento.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.tratamiento.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descTrat'), 'has-success': fields.descTrat && fields.descTrat.valid }">
    <label for="descTrat" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tratamiento.columns.descTrat') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descTrat" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descTrat'), 'form-control-success': fields.descTrat && fields.descTrat.valid}" id="descTrat" name="descTrat" placeholder="{{ trans('admin.tratamiento.columns.descTrat') }}">
        <div v-if="errors.has('descTrat')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descTrat') }}</div>
    </div>
</div>


