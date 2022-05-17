import AppForm from '../app-components/Form/AppForm';

Vue.component('diagnostico-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idCita:  '' ,
                idEnfermedad:  '' ,
                idPruebaLab:  '' ,
                idPruebaMor:  '' ,
                idTratamiento:  '' ,
                detalles:  '' ,
                
            }
        }
    }

});