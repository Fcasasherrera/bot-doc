<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SigEnf extends Model
{
    protected $fillable = [
        'idSigno',
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
        return url('/admin/sig-enfs/' . $this->getKey());
    }

    public function enfermedad()
    {

        return $this->hasOne(Enfermedad::class, 'id', 'idEnfermedad');
    }
}
