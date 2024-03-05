<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use Illuminate\Support\Facades\DB;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();

        return response()->json([
            'success' => true,
            'results' => $technologies
        ]);
    }
}
