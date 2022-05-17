import AppForm from '../app-components/Form/AppForm';

Vue.component('signo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});