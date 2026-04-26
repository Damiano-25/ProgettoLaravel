<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orto extends Model
{
    protected $table = 'orti'; //nome tabella gia esistente

    protected $fillable = [
        'nome',
        'descrizione',
    ];
    public $timestamps = false;
}
