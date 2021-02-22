<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePais;
use App\Models\Idioma;
use App\Utils\FileHelper;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paises = Pais::latest()->get();
        return view('admin.paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idiomas = Idioma::latest()->get();
        return view('admin.paises.create', compact('idiomas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreUpdatePais $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePais $request)
    {
        $data = $request->all();
        $data['bandeira'] = FileHelper::uploadFile($request, 'bandeira', 'paises');
        $data['imagem'] = FileHelper::uploadFile($request, 'imagem', 'paises');

        $pais = Pais::create($data);

        // Salva os idiomas falados no país
        $pais->idiomas()->attach($request->idiomas);

        return redirect()
            ->route('admin.paises.index')
            ->with('message', 'País criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show(Pais $pais)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id Id do país
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$pais = Pais::find($id)) return redirect()->back();

        $idiomas = Idioma::latest()->get();
        
        // Retorna uma lista com os ids de todos os idiomas falados no país
        $idiomas_pais = array_map(function($idioma) { return $idioma->id; }, iterator_to_array($pais->idiomas));

        return view('admin.paises.edit', compact('pais', 'idiomas', 'idiomas_pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\StoreUpdatePais $request
     * @param string $id Id do país
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePais $request, $id)
    {
        if (!$pais = Pais::find($id)) return redirect()->back();

        $data = $request->all();

        FileHelper::deleteFiles([$pais->bandeira, $pais->imagem]);
        $data['bandeira'] = FileHelper::uploadFile($request, 'bandeira', 'paises');
        $data['imagem'] = FileHelper::uploadFile($request, 'imagem', 'paises');

        $pais->update($data);

        // Salva os idiomas falados no país
        $pais->idiomas()->detach();
        $pais->idiomas()->attach($request->idiomas);

        return redirect()
            ->route('admin.paises.index')
            ->with('message', 'País editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id Id do país
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$pais = Pais::find($id)) return redirect()->route('admin.paises.index');

        FileHelper::deleteFiles([$pais->bandeira, $pais->imagem]);
        $pais->delete();

        return redirect()
            ->route('admin.paises.index')
            ->with('message', 'País deletado com sucesso!');
    }
}
