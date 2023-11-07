<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        $projects = Project::select("id", "slug", "type_id", "title", "description", "url")
            ->with('type', 'technologies')
            ->paginate(10);
        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::select("id", "slug", "type_id", "title", "description", "url")
            ->where('id', $id)
            ->with('type', 'technologies')
            ->first();
        return response()->json($project);
    }

}