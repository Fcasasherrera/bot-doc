import AppForm from '../app-components/Form/AppForm';

Vue.component('tra-enf-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idTratamiento:  '' ,
                idEnfermedad:  '' ,
                
            }
        }
    }

});