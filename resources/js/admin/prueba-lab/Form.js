import AppForm from '../app-components/Form/AppForm';

Vue.component('prueba-lab-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});