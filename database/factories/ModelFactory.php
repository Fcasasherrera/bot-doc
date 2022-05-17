<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Signo::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Enfermedad::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'descEnf' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Sintoma::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'descSin' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PruebaLab::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PruebaMortem::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tratamiento::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'descTrat' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Paciente::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'nss' => $faker->sentence,
        'fechaNac' => $faker->date(),
        'sexo' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Usuario::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'matricula' => $faker->sentence,
        'fechaIng' => $faker->date(),
        'contraseña' => $faker->sentence,
        'puesto' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\HistorialClin::class, static function (Faker\Generator $faker) {
    return [
        'idUsuario' => $faker->sentence,
        'idPaciente' => $faker->sentence,
        'fechaCreacion' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cita::class, static function (Faker\Generator $faker) {
    return [
        'idHistorial' => $faker->sentence,
        'idSigno' => $faker->sentence,
        'idSintoma' => $faker->sentence,
        'fechaCita' => $faker->date(),
        'detalles' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Diagnostico::class, static function (Faker\Generator $faker) {
    return [
        'idCita' => $faker->sentence,
        'idEnfermedad' => $faker->sentence,
        'idPruebaLab' => $faker->sentence,
        'idPruebaMor' => $faker->sentence,
        'idTratamiento' => $faker->sentence,
        'detalles' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SinEnf::class, static function (Faker\Generator $faker) {
    return [
        'idSintoma' => $faker->sentence,
        'idEnfermedad' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TraEnf::class, static function (Faker\Generator $faker) {
    return [
        'idTratamiento' => $faker->sentence,
        'idEnfermedad' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\MorEnf::class, static function (Faker\Generator $faker) {
    return [
        'idPruebaMor' => $faker->sentence,
        'idEnfermedad' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SigEnf::class, static function (Faker\Generator $faker) {
    return [
        'idSigno' => $faker->sentence,
        'idEnfermedad' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\LabEnf::class, static function (Faker\Generator $faker) {
    return [
        'idPruebaLab' => $faker->sentence,
        'idEnfermedad' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
