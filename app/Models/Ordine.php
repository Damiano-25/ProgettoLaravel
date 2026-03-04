<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ordine extends Model
{
    protected $table = 'ordini';

    protected $fillable = ['data_ordine', 'id_cliente'];

    public function cliente(): BelongsTo
    {
     
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function articoli(): BelongsToMany
    {
        return $this->belongsToMany(Articolo::class, 'ordini_articoli', 'id_ordine', 'id_articolo')
            ->withPivot('quantita');
    }
}