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
        return url('/admin/diagnosticos/'.$this->getKey());
    }
}
