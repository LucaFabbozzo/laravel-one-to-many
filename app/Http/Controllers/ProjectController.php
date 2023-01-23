<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $projects = Project::where('name', 'like', "%$search%")->paginate(3);
        } else {
            $projects = Project::orderBy('id', 'desc')->paginate(3);
        }
        $direction = 'desc';

        return view('admin.projects.index', compact('projects', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();

        $new_project = new Project();
        $form_data['slug'] = Project::generateSlug($form_data['name']);

        if (array_key_exists('cover_image', $form_data)) {
            $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $form_data['cover_image'] = Storage::put('uploads', $form_data['cover_image']);
        }




        $new_project->fill($form_data);
        $new_project->save();

        return redirect()->route('admin.projects.show', $new_project);
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
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if ($form_data['name'] != $project->name) {
            $form_data['slug'] = Project::generateSlug($form_data['name']);
        } else {
            $form_data['slug'] = $project->slug;
        }

        if (array_key_exists('cover_image', $form_data)) {
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $form_data['cover_image'] = Storage::put('uploads', $form_data['cover_image']);

        }

        $project->update($form_data);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }
        $project->delete();
        // con with() passo i dati in sessione alla vista
        return redirect()->route('admin.projects.index')->with('deleted', "The $project->name was succesfully deleted");
    }

    public function orderby($column, $direction)
    {
        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $projects = Project::orderby($column, $direction)->paginate(3);

        return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function types_project() {

        $types = Type::all();

        return view('admin.projects.list_type_project', compact('types'));
    }
}
