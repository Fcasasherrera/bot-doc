<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nombre',
        'matricula',
        'fechaIng',
        'contraseña',
        'puesto',
    
    ];
    
    
    protected $dates = [
        'fechaIng',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/usuarios/'.$this->getKey());
    }
}
