<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;
use App\Models\Paises;
use App\Models\Idiomas;

class PaisesController extends Controller
{
    //private $objMoedas;

    public function __construct()
    {
        $this->objPaises = new Paises();
        $this->objIdiomas = new Idiomas();
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
        //dd($this->objPaises->find(2)->relIdiomas);
        //dd($this->objPaises->find(2)->relIdiomas);
        //$paises = $this->objPaises->all();

        
        $paises = $this->objPaises->all()->sortBy('name');
        $idiomas = $this->objIdiomas->all()->sortBy('name');
        return view('paises', compact('paises', 'idiomas'));
        
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
    public function store(PaisRequest $request)
    {

        /*
        if ($request->btn == "Cadastrar") {
        dd($request);
        }
        */

        
        if ($request->btn == "Cadastrar") {
            $cad = $this->objPaises->create([
                'name' => $request->name,
                'id_idioma' => $request->id_idioma
            ]);

            if ($cad) {
                return redirect('paises');
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
        $pais_show = $this->objPaises->find($id);


        $paises = $this->objPaises->all()->sortBy('name');
        $idiomas = $this->objIdiomas->all()->sortBy('name');
        return view('paises', compact('paises', 'idiomas', 'pais_show'));
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
        $pais_edit = $this->objPaises->find($id);
        $idioma_edit = $this->objPaises->find($id)->relIdiomas;
        return view('paises', compact('paises', 'idiomas', 'editar', 'pais_edit', 'idioma_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaisRequest $request, $id)
    {
        if ($request->btn == "Atualizar") {
            $cad = $this->objPaises->where(['id'=>$id])->update([
                'name' => $request->name,
                'id_idioma' => $request->id_idioma
            ]);

            if ($cad) {
                return redirect('paises');
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
        $del = $this->objPaises->destroy($id);
        return($del)?"sim":"não";
    }
}
