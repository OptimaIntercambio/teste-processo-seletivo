<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idiomas;
use App\Models\Paises;

class IdiomasController extends Controller
{
    //private $objIdiomas;
    //private $objPaises;

    public function __construct()
    {
        $this->objIdiomas = new Idiomas();
        $this->objPaises = new Paises();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TESTES
        //dd($this->objIdiomas->all());
        //dd($this->objPaises->all());
        //dd($this->objIdiomas->find(1)->relPaises);
        //dd($this->objPaises->find(1)->relIdiomas);
        //$paises = $this->objPaises->all();
        

        
        // Prepara a lista de idiomas e envia para view.
        $paises = $this->objPaises->all()->sortBy('name');
        $idiomas = $this->objIdiomas->all()->sortBy('name');
        return view('idiomas', compact('paises', 'idiomas'));
             
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
            $cad = $this->objIdiomas->create([
                'name' => $request->name,
                'sigla' => $request->sigla
            ]);

            if ($cad) {
                return redirect('idiomas');
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
        $idioma_show = $this->objIdiomas->find($id);


        $paises = $this->objPaises->all()->sortBy('name');
        $idiomas = $this->objIdiomas->all()->sortBy('name');
        return view('idiomas', compact('paises', 'idiomas', 'idioma_show'));
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
        $paises = $this->objPaises->all()->sortBy('name');
        $idiomas = $this->objIdiomas->all()->sortBy('name');
        $idioma_edit = $this->objIdiomas->find($id);
        return view('idiomas', compact('paises', 'idiomas', 'editar', 'idioma_edit'));
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
            $cad = $this->objIdiomas->where(['id'=>$id])->update([
                'name' => $request->name,
                'sigla' => $request->sigla
            ]);

            if ($cad) {
                return redirect('idiomas');
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
        $del = $this->objIdiomas->destroy($id);
        return($del)?"sim":"não";
    }
}
