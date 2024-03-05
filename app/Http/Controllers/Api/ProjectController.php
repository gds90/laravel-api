<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technology')->orderBy('id', 'desc')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        // recupero il progetto attraverso lo slug passato come parametro
        $project = Project::with('type', 'technology')->where('slug', $slug)->first();

        // se esiste il progetto
        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        }
        // se non esiste
        return response()->json([
            'success' => false
        ]);
    }
}
