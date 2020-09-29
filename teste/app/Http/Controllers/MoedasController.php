<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moedas;

class MoedasController extends Controller
{
    private $objMoedas;

    public function __construct()
    {
        $this->objMoedas = new Moedas();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($this->objMoedas);

        $moedas = $this->objMoedas->all()->sortBy('name');
        return view('moedas', compact('moedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->btn == "Cadastrar") {
            $cad = $this->objMoedas->create([
                'name' => $request->name,
                'sigla' => $request->sigla,
                'dolar' => 0.18
            ]);

            if ($cad) {
                return redirect('moedas');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Guarda o item visualizado.
        $moeda_show = $this->objMoedas->find($id);

        $moedas = $this->objMoedas->all()->sortBy('name');
        return view('moedas', compact('moedas', 'moeda_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editar = "Editar";
        $moedas = $this->objMoedas->all()->sortBy('name');
        $moeda_edit = $this->objMoedas->find($id);
        return view('moedas', compact('moedas', 'editar', 'moeda_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->btn == "Atualizar") {
            $cad = $this->objMoedas->where(['id'=>$id])->update([
                'name' => $request->name,
                'sigla' => $request->sigla,
                'dolar' => 0.18
            ]);

            if ($cad) {
                return redirect('moedas');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objMoedas->destroy($id);
        return($del)?"sim":"não";
    }
}
