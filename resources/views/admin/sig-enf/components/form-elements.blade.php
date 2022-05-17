<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idSigno'), 'has-success': fields.idSigno && fields.idSigno.valid }">
    <label for="idSigno" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sig-enf.columns.idSigno') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idSigno" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idSigno'), 'form-control-success': fields.idSigno && fields.idSigno.valid}" id="idSigno" name="idSigno" placeholder="{{ trans('admin.sig-enf.columns.idSigno') }}">
        <div v-if="errors.has('idSigno')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idSigno') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idEnfermedad'), 'has-success': fields.idEnfermedad && fields.idEnfermedad.valid }">
    <label for="idEnfermedad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sig-enf.columns.idEnfermedad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idEnfermedad" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idEnfermedad'), 'form-control-success': fields.idEnfermedad && fields.idEnfermedad.valid}" id="idEnfermedad" name="idEnfermedad" placeholder="{{ trans('admin.sig-enf.columns.idEnfermedad') }}">
        <div v-if="errors.has('idEnfermedad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idEnfermedad') }}</div>
    </div>
</div>


