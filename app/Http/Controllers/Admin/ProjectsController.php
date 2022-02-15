<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\User;
use App\Models\Project;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all();

        return view('admin.Projects.Projets.index', compact('projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');
        $clients = Client::all();

        return view('admin.Projects.Projets.create', compact('users', 'clients'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());
        $project->users()->sync($request->input('users', []));

        return redirect()->route("admin.projects.index")->with('toast_success', 'Project Updated Successfully!');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');
        $clients = Client::all();

        $project->load('users');
        $project->load('clients');

        return view('admin.Projects.Projets.edit', compact('users', 'project', 'clients'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $project->update($request->all());
        $project->Users()->sync($request->input('users', []));

        return redirect()->route("admin.projects.index")->with('toast_success', 'Project Updated Successfully!');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('users');
        $project->load('clients');

        return view('admin.Projects.Projets.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
