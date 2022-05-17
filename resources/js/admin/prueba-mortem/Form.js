import AppForm from '../app-components/Form/AppForm';

Vue.component('prueba-mortem-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});