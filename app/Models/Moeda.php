<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moeda extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'codigo'];

    /**
     * Os países que usam a moeda.
     */
    public function paises()
    {
        return $this->belongsToMany(Pais::class);
    }

    /**
     * Lista de cambios da moeda
     */
    public function cambio()
    {
        return $this->hasMany(Cambio::class);
    }
}
