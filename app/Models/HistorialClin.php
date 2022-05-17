<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialClin extends Model
{
    protected $fillable = [
        'idUsuario',
        'idPaciente',
        'fechaCreacion',
    
    ];
    
    
    protected $dates = [
        'fechaCreacion',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/historial-clins/'.$this->getKey());
    }
}
