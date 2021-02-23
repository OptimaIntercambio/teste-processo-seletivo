<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'num_falantes'];

    /**
     * Os países que falam o idioma.
     */
    public function paises()
    {
        return $this->belongsToMany(Pais::class);
    }
}
