<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPaises;
use App\Models\ModelIdiomas;

//use App\Models\ModelMoedas;

class PaisesController extends Controller {

    private $objIdiomas;
    private $objPaises;

    //private $objMoedas;

    public function __construct() {
        $this->objIdiomas = new ModelIdiomas();
        $this->objPaises = new ModelPaises();
        //$this->objMoedas  = new ModelMoedas();
    }

    public function index() {
        $pais = $this->objPaises->paginate(5);
        return view('index', compact('pais'));
        //dd($this->objPaises->find(1)->relationPaises);
    }

    public function create() {
        $idiomas = $this->objIdiomas->all();
        return view('create', compact('idiomas'));
    }

    public function store(Request $request) {
        //insere dados no banco
        $cad = $this->objPaises->create([
            'nomePais' => $request->nomePais,
            'id_idioma' => $request->id_idioma,
        ]);
        if ($cad) {
            return redirect('paises');
        }
    }

    public function show($id) {
        //visualizar 
        $pais = $this->objPaises->find($id);
        return view('show', compact('pais'));
    }

    public function edit($id) {
        //editar
        $pais = $this->objPaises->find($id);
        $idiomas = $this->objIdiomas->all();
        return view('create', compact('pais', 'idiomas'));
    }

    public function update(Request $request, $id) {
        //atualizar
        $this->objPaises->where(['id' => $id])->update([
            'nomePais' => $request->nomePais,
            'id_idioma' => $request->id_idioma,
        ]);
        return redirect('paises');
    }

    public function destroy($id) {
        //delete
        $delete = $this->objPaises->destroy($id);
        return($delete)?"sim":"não";
    }

}
