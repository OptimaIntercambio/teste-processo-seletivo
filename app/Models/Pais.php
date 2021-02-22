<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';
    protected $fillable = ['nome', 'resumo', 'descricao', 'bandeira', 'imagem', 'populacao', 'pib', 'idh'];

    
    /**
     * Os idiomas falados no pais.
     */
    public function idiomas()
    {
        return $this->belongsToMany(Idioma::class);
    }
    
    /**
     * As moedas usadas no pais.
     */
    public function moedas()
    {
        return $this->belongsToMany(Moeda::class);
    }
}
