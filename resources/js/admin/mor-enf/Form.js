import AppForm from '../app-components/Form/AppForm';

Vue.component('mor-enf-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idPruebaMor:  '' ,
                idEnfermedad:  '' ,
                
            }
        }
    }

});