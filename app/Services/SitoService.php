<?php
namespace App\Services;

use App\Models\Sito;
class SitoService
{
/**
* Seleziona tutti i siti.
*/
public function getAll()
{
return Sito::all();
}
/**
* Crea un nuovo sito.
*/
public function create(array $data)
{
return Sito::create($data);
}
}