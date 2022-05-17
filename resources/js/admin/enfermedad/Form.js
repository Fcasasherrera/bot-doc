import AppForm from '../app-components/Form/AppForm';

Vue.component('enfermedad-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                descEnf:  '' ,
                
            }
        }
    }

});