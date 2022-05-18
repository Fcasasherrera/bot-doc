<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinEnf extends Model
{
    protected $fillable = [
        'idSintoma',
        'idEnfermedad',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/sin-enfs/' . $this->getKey());
    }

    public function enfermedad()
    {

        return $this->hasOne(Enfermedad::class, 'idEnfermedad', 'idEnfermedad');
    }
}
