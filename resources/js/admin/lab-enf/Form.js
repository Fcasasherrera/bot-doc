import AppForm from '../app-components/Form/AppForm';

Vue.component('lab-enf-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idPruebaLab:  '' ,
                idEnfermedad:  '' ,
                
            }
        }
    }

});