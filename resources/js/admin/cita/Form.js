import AppForm from '../app-components/Form/AppForm';

Vue.component('cita-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idHistorial:  '' ,
                idSigno:  '' ,
                idSintoma:  '' ,
                fechaCita:  '' ,
                detalles:  '' ,
                
            }
        }
    }

});