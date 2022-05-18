<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $fillable = [
        'idCita',
        'idEnfermedad',
        'idPruebaLab',
        'idPruebaMor',
        'idTratamiento',
        'detalles',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/diagnosticos/' . $this->getKey());
    }
    public function enfermedad()
    {
        return $this->hasOne(Enfermedad::class, 'id', 'idEnfermedad');
    }
    public function pruebasMor()
    {
        return $this->hasOne(PruebaMortem::class, 'id', 'idPruebaMor');
    }
    public function pruebasLab()
    {
        return $this->hasOne(PruebaLab::class, 'id', 'idPruebaLab');
    }
    public function tratamiento()
    {
        return $this->hasOne(Tratamiento::class, 'id', 'idTratamiento');
    }
}
