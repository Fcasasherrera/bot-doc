<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idPruebaLab'), 'has-success': fields.idPruebaLab && fields.idPruebaLab.valid }">
    <label for="idPruebaLab" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lab-enf.columns.idPruebaLab') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idPruebaLab" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idPruebaLab'), 'form-control-success': fields.idPruebaLab && fields.idPruebaLab.valid}" id="idPruebaLab" name="idPruebaLab" placeholder="{{ trans('admin.lab-enf.columns.idPruebaLab') }}">
        <div v-if="errors.has('idPruebaLab')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idPruebaLab') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idEnfermedad'), 'has-success': fields.idEnfermedad && fields.idEnfermedad.valid }">
    <label for="idEnfermedad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lab-enf.columns.idEnfermedad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idEnfermedad" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idEnfermedad'), 'form-control-success': fields.idEnfermedad && fields.idEnfermedad.valid}" id="idEnfermedad" name="idEnfermedad" placeholder="{{ trans('admin.lab-enf.columns.idEnfermedad') }}">
        <div v-if="errors.has('idEnfermedad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idEnfermedad') }}</div>
    </div>
</div>


