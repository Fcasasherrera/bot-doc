<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'nss',
        'birthdate',
        'sex',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'birthdate',
        'deleted_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/patients/'.$this->getKey());
    }
}
