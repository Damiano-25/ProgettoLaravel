<?php

namespace App\Http\Controllers;

use App\Models\Orto;
use App\Models\RecordPiante;
use App\Models\Piante;
use App\Models\TipologiePianta;
use Illuminate\Http\Request;
use App\Services\ArticoloService;
use function PHPUnit\Framework\returnArgument;

class OrtoController extends Controller
{
    protected $articoloService;
    public function __construct(ArticoloService $articoloService)
    {
        $this->articoloService = $articoloService;
    }

    public function index($id)
    {
        $orti = Orto::all();

        /*$dati = RecordPiante::where('id', 1)->first();

        $nomePianta = \App\Models\Piante::join(
            'tipologie_pianta',
            'piante.ID_TIPOLOGIA',
            '=',
            'tipologie_pianta.ID_TIPOLOGIA'
        )
        ->where('piante.ID_PIANTA', $dati->ID_PIANTA)
        ->value('tipologie_pianta.NOME_PIANTA');*/
        $dati = RecordPiante::where('ID_PIANTA', $id)
        ->orderByDesc('id') // prende il record più grande
        ->first();

        $nomePianta = Piante::join(
            'tipologie_pianta',
            'piante.ID_TIPOLOGIA',
            '=',
            'tipologie_pianta.ID_TIPOLOGIA'
        )
        ->where('piante.ID_PIANTA', $id)
        ->value('tipologie_pianta.NOME_PIANTA');
        
        return view('orti.index', compact('orti', 'dati', 'nomePianta'));
    }
    public function users()
    {
        $dati = RecordPiante::where('id', 1)->first();
        $sub = RecordPiante::selectRaw('MAX(id) as id')
        ->groupBy('ID_PIANTA');

        $dati2 = Piante::join('orti', 'piante.ID_ORTO', '=', 'orti.ID_ORTO')
            ->join('tipologie_pianta', 'piante.ID_TIPOLOGIA', '=', 'tipologie_pianta.ID_TIPOLOGIA')
            ->leftJoin('record_piante', function ($join) use ($sub) {
                $join->on('piante.ID_PIANTA', '=', 'record_piante.ID_PIANTA')
                    ->whereIn('record_piante.id', $sub);
            })
            ->select(
                'piante.ID_PIANTA',
                'tipologie_pianta.NOME_PIANTA',
                'orti.PROVINCIA_ORTO',
                'record_piante.DATA_RECORD',
                'record_piante.UMIDITA_RADICI_PERC'
            )
            ->get();
        
        $nomePianta = \App\Models\Piante::join(
            'tipologie_pianta',
            'piante.ID_TIPOLOGIA',
            '=',
            'tipologie_pianta.ID_TIPOLOGIA'
        )
        ->where('piante.ID_PIANTA', $dati->ID_PIANTA)
        ->value('tipologie_pianta.NOME_PIANTA');

        $nPiante=RecordPiante::count();
        return view('orti.users', compact('dati', 'nomePianta', 'nPiante', 'dati2'));
    }

    //creo metodo per mostrare form per inserire nuovo sito
    public function create()
    {
        return view('orti.create');
    }

    //creo metodo che salva sito nel db
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:30',
            'descrizione' => 'nullable|string|max:100',
        ]);

        Orto::create($data);

        return redirect()->route('orti.index');
    }

    //mostra form di modifica di un sito
    public function edit(Orto $orti)
    {
        return view('orti.edit', compact('orti'));
    }

    //request --> contiene dati inviarti dal client
    //sito --> sito selezionato
    public function update(Request $request, Orto $orti)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:30',
            'descrizione' => 'nullable|string|max:100',
        ]);

        $orti->update($data);

        return redirect()->route('orti.index');
    }

    //creo metodo per rimuovere sito
    public function destroy(Orto $orti)
    {
        $orti->delete();
        return redirect()->route('orti.index');
    }
}
