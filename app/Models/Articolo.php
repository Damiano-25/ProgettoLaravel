<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articolo extends Model
{
    protected $table = 'articoli'; //nome tabella gia esistente

    protected $fillable = [
        'nome',
        'descrizione',
    ];
    public $timestamps = false;
}
