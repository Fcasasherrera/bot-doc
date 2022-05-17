<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.paciente.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.paciente.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nss'), 'has-success': fields.nss && fields.nss.valid }">
    <label for="nss" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.paciente.columns.nss') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nss" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nss'), 'form-control-success': fields.nss && fields.nss.valid}" id="nss" name="nss" placeholder="{{ trans('admin.paciente.columns.nss') }}">
        <div v-if="errors.has('nss')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nss') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fechaNac'), 'has-success': fields.fechaNac && fields.fechaNac.valid }">
    <label for="fechaNac" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.paciente.columns.fechaNac') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fechaNac" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fechaNac'), 'form-control-success': fields.fechaNac && fields.fechaNac.valid}" id="fechaNac" name="fechaNac" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fechaNac')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fechaNac') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sexo'), 'has-success': fields.sexo && fields.sexo.valid }">
    <label for="sexo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.paciente.columns.sexo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sexo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sexo'), 'form-control-success': fields.sexo && fields.sexo.valid}" id="sexo" name="sexo" placeholder="{{ trans('admin.paciente.columns.sexo') }}">
        <div v-if="errors.has('sexo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sexo') }}</div>
    </div>
</div>


