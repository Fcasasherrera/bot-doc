<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\WebsiteController@index');
Route::get('/dashboard', 'App\Http\Controllers\WebsiteController@dashboard');
Route::get('/dashboard/medical-consult', 'App\Http\Controllers\WebsiteController@consult');

Route::post('/consultDisease', 'App\Http\Controllers\WebsiteController@consultDisease');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('users')->name('users/')->group(static function () {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('signos')->name('signos/')->group(static function () {
            Route::get('/',                                             'SignosController@index')->name('index');
            Route::get('/create',                                       'SignosController@create')->name('create');
            Route::post('/',                                            'SignosController@store')->name('store');
            Route::get('/{signo}/edit',                                 'SignosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SignosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{signo}',                                     'SignosController@update')->name('update');
            Route::delete('/{signo}',                                   'SignosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('enfermedads')->name('enfermedads/')->group(static function () {
            Route::get('/',                                             'EnfermedadsController@index')->name('index');
            Route::get('/create',                                       'EnfermedadsController@create')->name('create');
            Route::post('/',                                            'EnfermedadsController@store')->name('store');
            Route::get('/{enfermedad}/edit',                            'EnfermedadsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EnfermedadsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{enfermedad}',                                'EnfermedadsController@update')->name('update');
            Route::delete('/{enfermedad}',                              'EnfermedadsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('sintomas')->name('sintomas/')->group(static function () {
            Route::get('/',                                             'SintomasController@index')->name('index');
            Route::get('/create',                                       'SintomasController@create')->name('create');
            Route::post('/',                                            'SintomasController@store')->name('store');
            Route::get('/{sintoma}/edit',                               'SintomasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SintomasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{sintoma}',                                   'SintomasController@update')->name('update');
            Route::delete('/{sintoma}',                                 'SintomasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('prueba-labs')->name('prueba-labs/')->group(static function () {
            Route::get('/',                                             'PruebaLabsController@index')->name('index');
            Route::get('/create',                                       'PruebaLabsController@create')->name('create');
            Route::post('/',                                            'PruebaLabsController@store')->name('store');
            Route::get('/{pruebaLab}/edit',                             'PruebaLabsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PruebaLabsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pruebaLab}',                                 'PruebaLabsController@update')->name('update');
            Route::delete('/{pruebaLab}',                               'PruebaLabsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('prueba-mortems')->name('prueba-mortems/')->group(static function () {
            Route::get('/',                                             'PruebaMortemsController@index')->name('index');
            Route::get('/create',                                       'PruebaMortemsController@create')->name('create');
            Route::post('/',                                            'PruebaMortemsController@store')->name('store');
            Route::get('/{pruebaMortem}/edit',                          'PruebaMortemsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PruebaMortemsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pruebaMortem}',                              'PruebaMortemsController@update')->name('update');
            Route::delete('/{pruebaMortem}',                            'PruebaMortemsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('tratamientos')->name('tratamientos/')->group(static function () {
            Route::get('/',                                             'TratamientosController@index')->name('index');
            Route::get('/create',                                       'TratamientosController@create')->name('create');
            Route::post('/',                                            'TratamientosController@store')->name('store');
            Route::get('/{tratamiento}/edit',                           'TratamientosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TratamientosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tratamiento}',                               'TratamientosController@update')->name('update');
            Route::delete('/{tratamiento}',                             'TratamientosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('pacientes')->name('pacientes/')->group(static function () {
            Route::get('/',                                             'PacientesController@index')->name('index');
            Route::get('/create',                                       'PacientesController@create')->name('create');
            Route::post('/',                                            'PacientesController@store')->name('store');
            Route::get('/{paciente}/edit',                              'PacientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PacientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{paciente}',                                  'PacientesController@update')->name('update');
            Route::delete('/{paciente}',                                'PacientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('usuarios')->name('usuarios/')->group(static function () {
            Route::get('/',                                             'UsuariosController@index')->name('index');
            Route::get('/create',                                       'UsuariosController@create')->name('create');
            Route::post('/',                                            'UsuariosController@store')->name('store');
            Route::get('/{usuario}/edit',                               'UsuariosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsuariosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{usuario}',                                   'UsuariosController@update')->name('update');
            Route::delete('/{usuario}',                                 'UsuariosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('historial-clins')->name('historial-clins/')->group(static function () {
            Route::get('/',                                             'HistorialClinsController@index')->name('index');
            Route::get('/create',                                       'HistorialClinsController@create')->name('create');
            Route::post('/',                                            'HistorialClinsController@store')->name('store');
            Route::get('/{historialClin}/edit',                         'HistorialClinsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'HistorialClinsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{historialClin}',                             'HistorialClinsController@update')->name('update');
            Route::delete('/{historialClin}',                           'HistorialClinsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('citas')->name('citas/')->group(static function () {
            Route::get('/',                                             'CitasController@index')->name('index');
            Route::get('/create',                                       'CitasController@create')->name('create');
            Route::post('/',                                            'CitasController@store')->name('store');
            Route::get('/{citum}/edit',                                 'CitasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CitasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{citum}',                                     'CitasController@update')->name('update');
            Route::delete('/{citum}',                                   'CitasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('diagnosticos')->name('diagnosticos/')->group(static function () {
            Route::get('/',                                             'DiagnosticosController@index')->name('index');
            Route::get('/create',                                       'DiagnosticosController@create')->name('create');
            Route::post('/',                                            'DiagnosticosController@store')->name('store');
            Route::get('/{diagnostico}/edit',                           'DiagnosticosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DiagnosticosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{diagnostico}',                               'DiagnosticosController@update')->name('update');
            Route::delete('/{diagnostico}',                             'DiagnosticosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('sin-enfs')->name('sin-enfs/')->group(static function () {
            Route::get('/',                                             'SinEnfsController@index')->name('index');
            Route::get('/create',                                       'SinEnfsController@create')->name('create');
            Route::post('/',                                            'SinEnfsController@store')->name('store');
            Route::get('/{sinEnf}/edit',                                'SinEnfsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SinEnfsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{sinEnf}',                                    'SinEnfsController@update')->name('update');
            Route::delete('/{sinEnf}',                                  'SinEnfsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('tra-enfs')->name('tra-enfs/')->group(static function () {
            Route::get('/',                                             'TraEnfsController@index')->name('index');
            Route::get('/create',                                       'TraEnfsController@create')->name('create');
            Route::post('/',                                            'TraEnfsController@store')->name('store');
            Route::get('/{traEnf}/edit',                                'TraEnfsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TraEnfsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{traEnf}',                                    'TraEnfsController@update')->name('update');
            Route::delete('/{traEnf}',                                  'TraEnfsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('mor-enfs')->name('mor-enfs/')->group(static function () {
            Route::get('/',                                             'MorEnfsController@index')->name('index');
            Route::get('/create',                                       'MorEnfsController@create')->name('create');
            Route::post('/',                                            'MorEnfsController@store')->name('store');
            Route::get('/{morEnf}/edit',                                'MorEnfsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MorEnfsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{morEnf}',                                    'MorEnfsController@update')->name('update');
            Route::delete('/{morEnf}',                                  'MorEnfsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('sig-enfs')->name('sig-enfs/')->group(static function () {
            Route::get('/',                                             'SigEnfsController@index')->name('index');
            Route::get('/create',                                       'SigEnfsController@create')->name('create');
            Route::post('/',                                            'SigEnfsController@store')->name('store');
            Route::get('/{sigEnf}/edit',                                'SigEnfsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SigEnfsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{sigEnf}',                                    'SigEnfsController@update')->name('update');
            Route::delete('/{sigEnf}',                                  'SigEnfsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('lab-enfs')->name('lab-enfs/')->group(static function () {
            Route::get('/',                                             'LabEnfsController@index')->name('index');
            Route::get('/create',                                       'LabEnfsController@create')->name('create');
            Route::post('/',                                            'LabEnfsController@store')->name('store');
            Route::get('/{labEnf}/edit',                                'LabEnfsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LabEnfsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{labEnf}',                                    'LabEnfsController@update')->name('update');
            Route::delete('/{labEnf}',                                  'LabEnfsController@destroy')->name('destroy');
        });
    });
});
