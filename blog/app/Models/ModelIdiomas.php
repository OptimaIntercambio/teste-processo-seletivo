<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelIdiomas extends Model
{
    protected $table = 'idiomas';
    
    public function relationIdiomas()
    {
        return $this->hasOne('App\Models\ModelPaises', 'id_idioma', 'id');
    }
}
