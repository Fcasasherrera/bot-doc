<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sintoma.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.sintoma.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descSin'), 'has-success': fields.descSin && fields.descSin.valid }">
    <label for="descSin" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sintoma.columns.descSin') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descSin" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descSin'), 'form-control-success': fields.descSin && fields.descSin.valid}" id="descSin" name="descSin" placeholder="{{ trans('admin.sintoma.columns.descSin') }}">
        <div v-if="errors.has('descSin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descSin') }}</div>
    </div>
</div>


