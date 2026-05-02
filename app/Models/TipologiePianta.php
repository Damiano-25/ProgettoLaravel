<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipologiePianta extends Model
{
    protected $table = 'tipologie_pianta'; //nome tabella gia esistente

    protected $fillable = [
        'ID_TIPOLOGIA',
        'NOME_PIANTA'
    ];
    public $timestamps = false;
}
