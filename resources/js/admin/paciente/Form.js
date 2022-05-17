import AppForm from '../app-components/Form/AppForm';

Vue.component('paciente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                nss:  '' ,
                fechaNac:  '' ,
                sexo:  '' ,
                
            }
        }
    }

});