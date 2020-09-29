<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moedas extends Model
{
    protected $table = 'moedas';
    protected $fillable = ['name', 'sigla', 'dolar'];
}
