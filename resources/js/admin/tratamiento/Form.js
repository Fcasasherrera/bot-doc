import AppForm from '../app-components/Form/AppForm';

Vue.component('tratamiento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                descTrat:  '' ,
                
            }
        }
    }

});