<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.patient.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.patient.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nss'), 'has-success': fields.nss && fields.nss.valid }">
    <label for="nss" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.patient.columns.nss') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nss" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nss'), 'form-control-success': fields.nss && fields.nss.valid}" id="nss" name="nss" placeholder="{{ trans('admin.patient.columns.nss') }}">
        <div v-if="errors.has('nss')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nss') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthdate'), 'has-success': fields.birthdate && fields.birthdate.valid }">
    <label for="birthdate" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.patient.columns.birthdate') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthdate" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('birthdate'), 'form-control-success': fields.birthdate && fields.birthdate.valid}" id="birthdate" name="birthdate" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('birthdate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthdate') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sex'), 'has-success': fields.sex && fields.sex.valid }">
    <label for="sex" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.patient.columns.sex') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sex" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sex'), 'form-control-success': fields.sex && fields.sex.valid}" id="sex" name="sex" placeholder="{{ trans('admin.patient.columns.sex') }}">
        <div v-if="errors.has('sex')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sex') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.patient.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


