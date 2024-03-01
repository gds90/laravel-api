<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // creo una nuova istanza del model Project
        $type = new Type();

        // creo lo slug del progetto
        $slug = Str::slug($form_data['name'], '-');
        $form_data['slug'] = $slug;

        // riempio gli altri campi con la funzione fill()
        $type->fill($form_data);

        // salvo il record sul db
        $type->save();

        // effettuo il redirect alla view index
        return redirect()->route('admin.types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $type = Type::all();

        return view('admin.types.partials.modal_edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // creo lo slug della tipologia
        $form_data['slug'] = Str::slug($form_data['name'], '-');

        // aggiorno il record sul db
        $type->update($form_data);

        // effettuo il redirect alla view index
        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        // elimino la tipologia dal db
        $type->delete();

        return redirect()->route('admin.types.index')->with('message', 'Hai cancellato correttamente la tipologia');
    }
}
