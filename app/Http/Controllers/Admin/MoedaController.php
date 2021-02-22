<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMoeda;
use App\Models\Moeda;
use App\Models\Cambio;
use Illuminate\Http\Request;

class MoedaController extends Controller
{
    private $api_url = 'https://economia.awesomeapi.com.br';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moedas = Moeda::latest()->get();
        return view('admin.moedas.index', compact('moedas'));
    }

    /**
     * @param string $id Id da moeda
     * @return \Illuminate\Http\Response
     */
    public function cambio($id)
    {
        if (!$moeda = Moeda::find($id)) return redirect()->back();

        $cambio = $this->registerCambio($moeda);

        return view('admin.moedas.cambio', compact('moeda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $api_codigos = $this->getMoedasCodigosFromApi();
        return view('admin.moedas.create', compact('api_codigos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreUpdateMoeda $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMoeda $request)
    {
        Moeda::create($request->all());

        return redirect()
            ->route('admin.moedas.index')
            ->with('message', 'Moeda criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moeda  $moeda
     * @return \Illuminate\Http\Response
     */
    public function show(Moeda $moeda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id Id da moeda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$moeda = Moeda::find($id)) return redirect()->back();

        $api_codigos = $this->getMoedasCodigosFromApi();

        return view('admin.moedas.edit', compact('moeda', 'api_codigos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateMoeda  $request
     * @param  @param string $id Id da moeda
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMoeda $request, $id)
    {
        if (!$moeda = Moeda::find($id)) return redirect()->back();
        $moeda->update($request->all());

        return redirect()
            ->route('admin.moedas.index')
            ->with('message', 'Moeda editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id Id da moeda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$moeda = Moeda::find($id)) return redirect()->route('admin.moedas.index');

        $moeda->delete();

        return redirect()
            ->route('admin.moedas.index')
            ->with('message', 'Moeda deletada com sucesso!');
    }

    /**
     * Registra nova entrada na tabela de câmbio.
     *
     * @param  App\Models\Moeda $moeda
     * @return App\Models\Cambio
     */
    private function registerCambio(Moeda $moeda)
    {
        $api_moeda = $this->getMoedaCambioFromApi($moeda->codigo);
        if (empty($api_moeda)) return redirect()->back();

        $data = [
            'codein' => $api_moeda['codein'],
            'high' => $api_moeda['high'],
            'low' => $api_moeda['low'],
            'varBid' => $api_moeda['varBid'],
            'pctChange' => $api_moeda['pctChange'],
            'bid' => $api_moeda['bid'],
            'ask' => $api_moeda['ask'],
        ];


        // Adiciona uma nova entrada de câmbio na tabela caso não tenha outra
        // com a mesma data de atualização.
        $cambio = $moeda->cambio()->firstOrCreate($data, [
            'verified_date' => $api_moeda['create_date'],
        ]);

        return new Cambio($data);
    }

    private function getMoedasCodigosFromApi()
    {
        $json = file_get_contents("{$this->api_url}/json/all");
        $api_moedas = json_decode($json, true);

        return array_keys($api_moedas);
    }

    private function getMoedaCambioFromApi($codigo)
    {
        $json = file_get_contents("{$this->api_url}/all/{$codigo}-BRL");
        $api_moeda = json_decode($json, true);

        return !empty($api_moeda) ? array_values($api_moeda)[0] : [];
    }
}
