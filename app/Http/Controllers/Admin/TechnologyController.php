<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $badge_colors = [
            ['name' => 'Blu', 'badge_color' => 'primary'],
            ['name' => 'Grigio', 'badge_color' => 'secondary'],
            ['name' => 'Verde', 'badge_color' => 'success'],
            ['name' => 'Rosso', 'badge_color' => 'danger'],
            ['name' => 'Giallo', 'badge_color' => 'warning'],
            ['name' => 'Azzurro', 'badge_color' => 'info'],
            ['name' => 'Bianco', 'badge_color' => 'light'],
            ['name' => 'Nero', 'badge_color' => 'dark'],
        ];

        return view('admin.technologies.create', compact('badge_colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechnologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnologyRequest $request)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // creo una nuova istanza del model Technology
        $technology = new Technology();

        // creo lo slug della tecnologia
        $slug = Str::slug($form_data['name'], '-');
        $form_data['slug'] = $slug;

        // riempio gli altri campi con la funzione fill()
        $technology->fill($form_data);

        // salvo il record sul db
        $technology->save();

        // effettuo il redirect alla view index
        return redirect()->route('admin.technologies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        $badge_colors = [
            ['name' => 'Blu', 'badge_color' => 'primary'],
            ['name' => 'Grigio', 'badge_color' => 'secondary'],
            ['name' => 'Verde', 'badge_color' => 'success'],
            ['name' => 'Rosso', 'badge_color' => 'danger'],
            ['name' => 'Giallo', 'badge_color' => 'warning'],
            ['name' => 'Azzurro', 'badge_color' => 'info'],
            ['name' => 'Bianco', 'badge_color' => 'light'],
            ['name' => 'Nero', 'badge_color' => 'dark'],
        ];

        return view('admin.technologies.edit', compact('technology', 'badge_colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechnologyRequest  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // controllo che non esista un'altra tecnologia con lo stesso titolo passato dal form di modifica
        $exists = Technology::where('name', 'LIKE', $form_data['name'])
            ->where('id', '!=', $technology->id)
            ->get();

        if (count($exists) > 0) {
            $error_message = 'Hai inserito un titolo già presente in un altro articolo';
            return redirect()->route('admin.technologies.edit', compact('technology', 'error_message'));
        }

        // creo lo slug della tipologia
        $form_data['slug'] = Str::slug($form_data['name'], '-');

        // aggiorno il record sul db
        $technology->update($form_data);

        // effettuo il redirect alla view index
        return redirect()->route('admin.technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        // elimino il progetto dal db
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
