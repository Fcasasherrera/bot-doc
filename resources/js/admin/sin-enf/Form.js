import AppForm from '../app-components/Form/AppForm';

Vue.component('sin-enf-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idSintoma:  '' ,
                idEnfermedad:  '' ,
                
            }
        }
    }

});