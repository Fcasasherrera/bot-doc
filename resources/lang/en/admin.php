<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            
        ],
    ],

    'signo' => [
        'title' => 'Signos',

        'actions' => [
            'index' => 'Signos',
            'create' => 'New Signo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'enfermedad' => [
        'title' => 'Enfermedads',

        'actions' => [
            'index' => 'Enfermedads',
            'create' => 'New Enfermedad',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descEnf' => 'DescEnf',
            
        ],
    ],

    'sintoma' => [
        'title' => 'Sintomas',

        'actions' => [
            'index' => 'Sintomas',
            'create' => 'New Sintoma',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descSin' => 'DescSin',
            
        ],
    ],

    'prueba-lab' => [
        'title' => 'Prueba Labs',

        'actions' => [
            'index' => 'Prueba Labs',
            'create' => 'New Prueba Lab',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'prueba-mortem' => [
        'title' => 'Prueba Mortems',

        'actions' => [
            'index' => 'Prueba Mortems',
            'create' => 'New Prueba Mortem',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'tratamiento' => [
        'title' => 'Tratamientos',

        'actions' => [
            'index' => 'Tratamientos',
            'create' => 'New Tratamiento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descTrat' => 'DescTrat',
            
        ],
    ],

    'paciente' => [
        'title' => 'Pacientes',

        'actions' => [
            'index' => 'Pacientes',
            'create' => 'New Paciente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'nss' => 'Nss',
            'fechaNac' => 'FechaNac',
            'sexo' => 'Sexo',
            
        ],
    ],

    'usuario' => [
        'title' => 'Usuarios',

        'actions' => [
            'index' => 'Usuarios',
            'create' => 'New Usuario',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'matricula' => 'Matricula',
            'fechaIng' => 'FechaIng',
            'contraseña' => 'Contraseña',
            'puesto' => 'Puesto',
            
        ],
    ],

    'historial-clin' => [
        'title' => 'Historial Clins',

        'actions' => [
            'index' => 'Historial Clins',
            'create' => 'New Historial Clin',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idUsuario' => 'IdUsuario',
            'idPaciente' => 'IdPaciente',
            'fechaCreacion' => 'FechaCreacion',
            
        ],
    ],

    'cita' => [
        'title' => 'Citas',

        'actions' => [
            'index' => 'Citas',
            'create' => 'New Cita',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idHistorial' => 'IdHistorial',
            'idSigno' => 'IdSigno',
            'idSintoma' => 'IdSintoma',
            'fechaCita' => 'FechaCita',
            'detalles' => 'Detalles',
            
        ],
    ],

    'diagnostico' => [
        'title' => 'Diagnosticos',

        'actions' => [
            'index' => 'Diagnosticos',
            'create' => 'New Diagnostico',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idCita' => 'IdCita',
            'idEnfermedad' => 'IdEnfermedad',
            'idPruebaLab' => 'IdPruebaLab',
            'idPruebaMor' => 'IdPruebaMor',
            'idTratamiento' => 'IdTratamiento',
            'detalles' => 'Detalles',
            
        ],
    ],

    'sin-enf' => [
        'title' => 'Sin Enfs',

        'actions' => [
            'index' => 'Sin Enfs',
            'create' => 'New Sin Enf',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idSintoma' => 'IdSintoma',
            'idEnfermedad' => 'IdEnfermedad',
            
        ],
    ],

    'tra-enf' => [
        'title' => 'Tra Enfs',

        'actions' => [
            'index' => 'Tra Enfs',
            'create' => 'New Tra Enf',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idTratamiento' => 'IdTratamiento',
            'idEnfermedad' => 'IdEnfermedad',
            
        ],
    ],

    'mor-enf' => [
        'title' => 'Mor Enfs',

        'actions' => [
            'index' => 'Mor Enfs',
            'create' => 'New Mor Enf',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idPruebaMor' => 'IdPruebaMor',
            'idEnfermedad' => 'IdEnfermedad',
            
        ],
    ],

    'sig-enf' => [
        'title' => 'Sig Enfs',

        'actions' => [
            'index' => 'Sig Enfs',
            'create' => 'New Sig Enf',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idSigno' => 'IdSigno',
            'idEnfermedad' => 'IdEnfermedad',
            
        ],
    ],

    'lab-enf' => [
        'title' => 'Lab Enfs',

        'actions' => [
            'index' => 'Lab Enfs',
            'create' => 'New Lab Enf',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'idPruebaLab' => 'IdPruebaLab',
            'idEnfermedad' => 'IdEnfermedad',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];