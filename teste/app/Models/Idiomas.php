<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    protected $table = 'idiomas';
    protected $fillable = ['name', 'sigla'];

    public function relPaises()
    {
        // Relaciona o idioma 'id_idioma' com o 'id' do país.
        return $this->hasOne('App\Models\Paises', 'id_idioma', 'id');
    }
}
