import AppForm from '../app-components/Form/AppForm';

Vue.component('sintoma-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                descSin:  '' ,
                
            }
        }
    }

});