<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.usuario.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('matricula'), 'has-success': fields.matricula && fields.matricula.valid }">
    <label for="matricula" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.matricula') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.matricula" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('matricula'), 'form-control-success': fields.matricula && fields.matricula.valid}" id="matricula" name="matricula" placeholder="{{ trans('admin.usuario.columns.matricula') }}">
        <div v-if="errors.has('matricula')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('matricula') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fechaIng'), 'has-success': fields.fechaIng && fields.fechaIng.valid }">
    <label for="fechaIng" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.fechaIng') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fechaIng" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fechaIng'), 'form-control-success': fields.fechaIng && fields.fechaIng.valid}" id="fechaIng" name="fechaIng" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fechaIng')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fechaIng') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('contraseña'), 'has-success': fields.contraseña && fields.contraseña.valid }">
    <label for="contraseña" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.contraseña') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.contraseña" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contraseña'), 'form-control-success': fields.contraseña && fields.contraseña.valid}" id="contraseña" name="contraseña" placeholder="{{ trans('admin.usuario.columns.contraseña') }}">
        <div v-if="errors.has('contraseña')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contraseña') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('puesto'), 'has-success': fields.puesto && fields.puesto.valid }">
    <label for="puesto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.puesto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.puesto" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('puesto'), 'form-control-success': fields.puesto && fields.puesto.valid}" id="puesto" name="puesto" placeholder="{{ trans('admin.usuario.columns.puesto') }}">
        <div v-if="errors.has('puesto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('puesto') }}</div>
    </div>
</div>


