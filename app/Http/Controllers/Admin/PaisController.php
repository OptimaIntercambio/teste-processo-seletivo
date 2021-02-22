<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePais;
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
        return view('admin.paises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePais $request)
    {
        $data = $request->all();
        $data['bandeira'] = FileHelper::uploadFile($request, 'bandeira', 'paises');
        $data['imagem'] = FileHelper::uploadFile($request, 'imagem', 'paises');

        Pais::create($data);

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
        return view('admin.paises.edit', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $id Id do país
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$pais = Pais::find($id)) return redirect()->back();

        $data = $request->all();

        FileHelper::deleteFiles([$pais->bandeira, $pais->imagem]);
        $data['bandeira'] = FileHelper::uploadFile($request, 'bandeira', 'paises');
        $data['imagem'] = FileHelper::uploadFile($request, 'imagem', 'paises');

        $pais->update($data);
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
