import AppForm from '../app-components/Form/AppForm';

Vue.component('historial-clin-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idUsuario:  '' ,
                idPaciente:  '' ,
                fechaCreacion:  '' ,
                
            }
        }
    }

});