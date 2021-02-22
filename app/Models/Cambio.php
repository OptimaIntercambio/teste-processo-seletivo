<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    use HasFactory;

    protected $table = 'cambio';
    protected $dates = ['verified_date'];
    protected $fillable = ['codein', 'high', 'low', 'varBid', 'pctChange', 'bid', 'ask', 'verified_date'];
}
