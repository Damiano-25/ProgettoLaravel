<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $table = 'clienti';

    protected $fillable = [
        'nome','cognome','indirizzo_via','indirizzo_civico','indirizzo_citta'
    ];

public function ordini(): HasMany
{
    return $this->hasMany(Ordine::class, 'id_cliente');
}
}