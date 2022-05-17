<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idHistorial'), 'has-success': fields.idHistorial && fields.idHistorial.valid }">
    <label for="idHistorial" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cita.columns.idHistorial') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idHistorial" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idHistorial'), 'form-control-success': fields.idHistorial && fields.idHistorial.valid}" id="idHistorial" name="idHistorial" placeholder="{{ trans('admin.cita.columns.idHistorial') }}">
        <div v-if="errors.has('idHistorial')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idHistorial') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idSigno'), 'has-success': fields.idSigno && fields.idSigno.valid }">
    <label for="idSigno" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cita.columns.idSigno') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idSigno" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idSigno'), 'form-control-success': fields.idSigno && fields.idSigno.valid}" id="idSigno" name="idSigno" placeholder="{{ trans('admin.cita.columns.idSigno') }}">
        <div v-if="errors.has('idSigno')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idSigno') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idSintoma'), 'has-success': fields.idSintoma && fields.idSintoma.valid }">
    <label for="idSintoma" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cita.columns.idSintoma') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idSintoma" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idSintoma'), 'form-control-success': fields.idSintoma && fields.idSintoma.valid}" id="idSintoma" name="idSintoma" placeholder="{{ trans('admin.cita.columns.idSintoma') }}">
        <div v-if="errors.has('idSintoma')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idSintoma') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fechaCita'), 'has-success': fields.fechaCita && fields.fechaCita.valid }">
    <label for="fechaCita" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cita.columns.fechaCita') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fechaCita" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fechaCita'), 'form-control-success': fields.fechaCita && fields.fechaCita.valid}" id="fechaCita" name="fechaCita" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fechaCita')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fechaCita') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('detalles'), 'has-success': fields.detalles && fields.detalles.valid }">
    <label for="detalles" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cita.columns.detalles') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.detalles" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('detalles'), 'form-control-success': fields.detalles && fields.detalles.valid}" id="detalles" name="detalles" placeholder="{{ trans('admin.cita.columns.detalles') }}">
        <div v-if="errors.has('detalles')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('detalles') }}</div>
    </div>
</div>


