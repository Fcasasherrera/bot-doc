<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idSintoma'), 'has-success': fields.idSintoma && fields.idSintoma.valid }">
    <label for="idSintoma" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sin-enf.columns.idSintoma') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idSintoma" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idSintoma'), 'form-control-success': fields.idSintoma && fields.idSintoma.valid}" id="idSintoma" name="idSintoma" placeholder="{{ trans('admin.sin-enf.columns.idSintoma') }}">
        <div v-if="errors.has('idSintoma')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idSintoma') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idEnfermedad'), 'has-success': fields.idEnfermedad && fields.idEnfermedad.valid }">
    <label for="idEnfermedad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sin-enf.columns.idEnfermedad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idEnfermedad" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idEnfermedad'), 'form-control-success': fields.idEnfermedad && fields.idEnfermedad.valid}" id="idEnfermedad" name="idEnfermedad" placeholder="{{ trans('admin.sin-enf.columns.idEnfermedad') }}">
        <div v-if="errors.has('idEnfermedad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idEnfermedad') }}</div>
    </div>
</div>


