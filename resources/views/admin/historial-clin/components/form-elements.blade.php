<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idUsuario'), 'has-success': fields.idUsuario && fields.idUsuario.valid }">
    <label for="idUsuario" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.historial-clin.columns.idUsuario') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idUsuario" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idUsuario'), 'form-control-success': fields.idUsuario && fields.idUsuario.valid}" id="idUsuario" name="idUsuario" placeholder="{{ trans('admin.historial-clin.columns.idUsuario') }}">
        <div v-if="errors.has('idUsuario')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idUsuario') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idPaciente'), 'has-success': fields.idPaciente && fields.idPaciente.valid }">
    <label for="idPaciente" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.historial-clin.columns.idPaciente') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idPaciente" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idPaciente'), 'form-control-success': fields.idPaciente && fields.idPaciente.valid}" id="idPaciente" name="idPaciente" placeholder="{{ trans('admin.historial-clin.columns.idPaciente') }}">
        <div v-if="errors.has('idPaciente')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idPaciente') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fechaCreacion'), 'has-success': fields.fechaCreacion && fields.fechaCreacion.valid }">
    <label for="fechaCreacion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.historial-clin.columns.fechaCreacion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fechaCreacion" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fechaCreacion'), 'form-control-success': fields.fechaCreacion && fields.fechaCreacion.valid}" id="fechaCreacion" name="fechaCreacion" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fechaCreacion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fechaCreacion') }}</div>
    </div>
</div>


