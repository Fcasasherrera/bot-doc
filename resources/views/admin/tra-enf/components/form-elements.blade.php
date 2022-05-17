<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idTratamiento'), 'has-success': fields.idTratamiento && fields.idTratamiento.valid }">
    <label for="idTratamiento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tra-enf.columns.idTratamiento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idTratamiento" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idTratamiento'), 'form-control-success': fields.idTratamiento && fields.idTratamiento.valid}" id="idTratamiento" name="idTratamiento" placeholder="{{ trans('admin.tra-enf.columns.idTratamiento') }}">
        <div v-if="errors.has('idTratamiento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idTratamiento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idEnfermedad'), 'has-success': fields.idEnfermedad && fields.idEnfermedad.valid }">
    <label for="idEnfermedad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tra-enf.columns.idEnfermedad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idEnfermedad" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idEnfermedad'), 'form-control-success': fields.idEnfermedad && fields.idEnfermedad.valid}" id="idEnfermedad" name="idEnfermedad" placeholder="{{ trans('admin.tra-enf.columns.idEnfermedad') }}">
        <div v-if="errors.has('idEnfermedad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idEnfermedad') }}</div>
    </div>
</div>


