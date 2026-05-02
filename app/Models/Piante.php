<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piante extends Model
{
    protected $table = 'piante'; //nome tabella gia esistente

    protected $fillable = [
        'ID_PIANTA',
        'ID_ORTO',
        'ID_TIPOLOGIA'
    ];
    public $timestamps = false;
}
