<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idCita'), 'has-success': fields.idCita && fields.idCita.valid }">
    <label for="idCita" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diagnostico.columns.idCita') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idCita" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idCita'), 'form-control-success': fields.idCita && fields.idCita.valid}" id="idCita" name="idCita" placeholder="{{ trans('admin.diagnostico.columns.idCita') }}">
        <div v-if="errors.has('idCita')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idCita') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idEnfermedad'), 'has-success': fields.idEnfermedad && fields.idEnfermedad.valid }">
    <label for="idEnfermedad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diagnostico.columns.idEnfermedad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idEnfermedad" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idEnfermedad'), 'form-control-success': fields.idEnfermedad && fields.idEnfermedad.valid}" id="idEnfermedad" name="idEnfermedad" placeholder="{{ trans('admin.diagnostico.columns.idEnfermedad') }}">
        <div v-if="errors.has('idEnfermedad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idEnfermedad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idPruebaLab'), 'has-success': fields.idPruebaLab && fields.idPruebaLab.valid }">
    <label for="idPruebaLab" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diagnostico.columns.idPruebaLab') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idPruebaLab" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idPruebaLab'), 'form-control-success': fields.idPruebaLab && fields.idPruebaLab.valid}" id="idPruebaLab" name="idPruebaLab" placeholder="{{ trans('admin.diagnostico.columns.idPruebaLab') }}">
        <div v-if="errors.has('idPruebaLab')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idPruebaLab') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idPruebaMor'), 'has-success': fields.idPruebaMor && fields.idPruebaMor.valid }">
    <label for="idPruebaMor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diagnostico.columns.idPruebaMor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idPruebaMor" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idPruebaMor'), 'form-control-success': fields.idPruebaMor && fields.idPruebaMor.valid}" id="idPruebaMor" name="idPruebaMor" placeholder="{{ trans('admin.diagnostico.columns.idPruebaMor') }}">
        <div v-if="errors.has('idPruebaMor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idPruebaMor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idTratamiento'), 'has-success': fields.idTratamiento && fields.idTratamiento.valid }">
    <label for="idTratamiento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diagnostico.columns.idTratamiento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idTratamiento" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idTratamiento'), 'form-control-success': fields.idTratamiento && fields.idTratamiento.valid}" id="idTratamiento" name="idTratamiento" placeholder="{{ trans('admin.diagnostico.columns.idTratamiento') }}">
        <div v-if="errors.has('idTratamiento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idTratamiento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('detalles'), 'has-success': fields.detalles && fields.detalles.valid }">
    <label for="detalles" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diagnostico.columns.detalles') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.detalles" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('detalles'), 'form-control-success': fields.detalles && fields.detalles.valid}" id="detalles" name="detalles" placeholder="{{ trans('admin.diagnostico.columns.detalles') }}">
        <div v-if="errors.has('detalles')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('detalles') }}</div>
    </div>
</div>


