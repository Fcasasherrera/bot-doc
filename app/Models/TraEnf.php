<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraEnf extends Model
{
    protected $fillable = [
        'idTratamiento',
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
        return url('/admin/tra-enfs/'.$this->getKey());
    }
}
