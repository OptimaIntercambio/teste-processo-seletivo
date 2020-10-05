<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPaises extends Model
{
     protected $table = 'model_paises';
     protected $fillable = ['nomePais','id_idioma'];
     
     public function relationPaises()
    {
        return $this->hasOne('App\Models\ModelIdiomas', 'id', 'id_idioma');
    }
}
