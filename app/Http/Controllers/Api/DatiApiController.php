<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DatiService;
use Illuminate\Http\Request;

class DatiApiController extends Controller
{
    protected $datiService;

    public function __construct(DatiService $datiService)
    {
        $this->datiService = $datiService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'temperatura' => 'required|numeric',
            'umidita_aria' => 'required|numeric',
            'suolo' => 'required|integer',
            'acqua' => 'required|integer',
            'rele' => 'required|integer'
        ]);

        $dato = $this->datiService->salvaDati($request);

        return response()->json([
            'messaggio' => 'Dati salvati correttamente',
            'dato' => $dato
        ], 200);
    }
}