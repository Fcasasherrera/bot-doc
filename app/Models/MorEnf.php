<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MorEnf extends Model
{
    protected $fillable = [
        'idPruebaMor',
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
        return url('/admin/mor-enfs/'.$this->getKey());
    }
}
