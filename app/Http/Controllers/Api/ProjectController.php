<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function get_technology_projects($slug)
    {
        $projects = DB::table('projects')
            ->join('project_technology', 'project_technology.project_id', '=', 'projects.id')
            ->join('technologies', 'project_technology.technology_id', '=', 'technologies.id')
            ->select('projects.*', 'technologies.name as technology_name', 'technologies.slug as technology_slug')
            ->where('technologies.slug', '=', $slug)
            ->paginate(6);


        return response()->json([

            'success' => true,
            'results' => $projects
        ]);
    }
}
