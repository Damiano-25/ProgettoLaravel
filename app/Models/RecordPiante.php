<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordPiante extends Model
{
    protected $table = 'record_piante'; //nome tabella gia esistente

    protected $fillable = [
        'UMIDITA_RADICI_PERC',
        'ESPOSIZIONE_SOLARE_EFFETTIVA',
        'DATA_RECORD',
        'ID_PIANTA'
    ];
    public $timestamps = false;
}
