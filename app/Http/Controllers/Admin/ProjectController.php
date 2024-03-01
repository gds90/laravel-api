<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // recupero i tipi di progetto per mostrarli nella form di creazione del progetto
        $types = Type::all();
        // recupero i tipi di tecnologia
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // verifico se la richiesta contiene il campo cover_image:
        if ($request->hasFile('cover_image')) {
            // eseguo l'upload del file e recupero il path
            $path = Storage::disk('public')->put('projects_image', $form_data['cover_image']);
            $form_data['cover_image'] = $path;
        }

        // creo una nuova istanza del model Project
        $project = new Project();

        // creo lo slug del progetto
        $slug = Str::slug($form_data['title'], '-');
        $form_data['slug'] = $slug;

        // riempio gli altri campi con la funzione fill()
        $project->fill($form_data);

        // salvo il record sul db
        $project->save();

        // controllo se sono stati aggiunte delle tecnologie al progetto
        if ($request->has('technologies')) {
            $project->technology()->attach($form_data['technologies']);
        }

        // effettuo il redirect alla view index
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Request $request)
    {
        $error_message = '';

        if (!empty($request->all())) {
            $messages = $request->all();
            $error_message = $messages['error_message'];
        }

        // recupero i tipi di progetto per mostrarli nella form di creazione del progetto
        $types = Type::all();
        // recupero i tipi di tecnologia
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies', 'error_message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $error_message = '';

        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // controllo che non esista un altro progetto con lo stesso titolo passato dal form di modifica
        $exists = Project::where('title', 'LIKE', $form_data['title'])
            ->where('id', '!=', $project->id)
            ->get();

        if (count($exists) > 0) {
            $error_message = 'Hai inserito un titolo già presente in un altro articolo';
            return redirect()->route('admin.projects.edit', compact('project', 'error_message'));
        }

        if ($request->hasFile('cover_image')) {
            // se il progetto ha già un immagine, la elimino
            if ($project->cover_image != null) {
                Storage::disk('public')->delete($project->cover_image);
            }

            // eseguo l'upload della nuova immagine e recupero il path
            $path = Storage::disk('public')->put('projects_image', $form_data['cover_image']);
            $form_data['cover_image'] = $path;
        }

        // creo lo slug del progetto
        $form_data['slug'] = Str::slug($form_data['title'], '-');

        // aggiorno il record sul db
        $project->update($form_data);

        // associo le tecnologie al progetto
        if ($request->has('technologies')) {
            $project->technology()->sync($form_data['technologies']);
        } else {
            $project->technology()->sync([]);
        }

        // effettuo il redirect alla view index
        return redirect()->route('admin.projects.index', compact('error_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // controllo se il progetto ha un'immagine da eliminare
        if ($project->cover_image != null) {
            Storage::disk('public')->delete($project->cover_image);
        }

        // elimino il progetto dal db
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
