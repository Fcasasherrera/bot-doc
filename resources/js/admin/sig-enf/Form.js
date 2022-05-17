import AppForm from '../app-components/Form/AppForm';

Vue.component('sig-enf-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idSigno:  '' ,
                idEnfermedad:  '' ,
                
            }
        }
    }

});