<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneio extends Model
{
    protected $table = 'torneios';

    protected $fillable = [
        'titulo',
        'premio',
        'data_evento'
    ];
}