<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = 'paises';
    protected $fillable = ['name', 'id_idioma'];

    public function relIdiomas()
    {
        // Relaciona o idioma 'id_idioma' com o 'id' do país.
        return $this->hasOne('App\Models\Idiomas', 'id', 'id_idioma');
    }
}
