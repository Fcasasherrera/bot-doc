<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idPruebaMor'), 'has-success': fields.idPruebaMor && fields.idPruebaMor.valid }">
    <label for="idPruebaMor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mor-enf.columns.idPruebaMor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idPruebaMor" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idPruebaMor'), 'form-control-success': fields.idPruebaMor && fields.idPruebaMor.valid}" id="idPruebaMor" name="idPruebaMor" placeholder="{{ trans('admin.mor-enf.columns.idPruebaMor') }}">
        <div v-if="errors.has('idPruebaMor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idPruebaMor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idEnfermedad'), 'has-success': fields.idEnfermedad && fields.idEnfermedad.valid }">
    <label for="idEnfermedad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mor-enf.columns.idEnfermedad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idEnfermedad" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idEnfermedad'), 'form-control-success': fields.idEnfermedad && fields.idEnfermedad.valid}" id="idEnfermedad" name="idEnfermedad" placeholder="{{ trans('admin.mor-enf.columns.idEnfermedad') }}">
        <div v-if="errors.has('idEnfermedad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idEnfermedad') }}</div>
    </div>
</div>


