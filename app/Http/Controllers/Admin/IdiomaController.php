<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateIdioma;
use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idiomas = Idioma::latest()->get();
        return view('admin.idiomas.index', compact('idiomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.idiomas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreUpdateIdioma $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateIdioma $request)
    {
        Idioma::create($request->all());

        return redirect()
            ->route('admin.idiomas.index')
            ->with('message', 'Idioma criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function show(Idioma $idioma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id Id do idioma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$idioma = Idioma::find($id)) return redirect()->back();
        return view('admin.idiomas.edit', compact('idioma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateIdioma  $request
     * @param string $id Id do idioma
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateIdioma $request, $id)
    {
        if (!$idioma = Idioma::find($id)) return redirect()->back();
        $idioma->update($request->all());

        return redirect()
            ->route('admin.idiomas.index')
            ->with('message', 'Idioma editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id Id do idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$idioma = Idioma::find($id)) return redirect()->route('admin.idiomas.index');

        $idioma->delete();

        return redirect()
            ->route('admin.idiomas.index')
            ->with('message', 'Idioma deletado com sucesso!');
    }
}
