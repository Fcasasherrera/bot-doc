<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'idHistorial',
        'idSigno',
        'idSintoma',
        'fechaCita',
        'detalles',

    ];


    protected $dates = [
        'fechaCita',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/citas/' . $this->getKey());
    }
    public function signo()
    {
        return $this->hasOne(Signo::class, 'id', 'idSigno');
    }
    public function sintoma()
    {
        return $this->hasOne(Sintoma::class, 'id', 'idSintoma');
    }
}
