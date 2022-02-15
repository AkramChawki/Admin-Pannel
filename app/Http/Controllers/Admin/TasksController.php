<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TasksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $Is_Admin = auth()->user()->roles->contains(function ($role) {
            return $role->pivot->role_id == 1;
        });

        if ($Is_Admin) {
            $tasks = Task::all();
        }else {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        }
        return view('admin.Tasks.Taches.index', compact('tasks'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();
        $projects = Project::all();

        return view('admin.Tasks.Taches.create', compact('users', 'projects'));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());

        return redirect()->route('admin.tasks.index')->with('toast_success', 'Task Added Successfully!');
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();
        $projects = Project::all();
        $task->load('users');
        $task->load('projects');

        return view('admin.Tasks.Taches.edit', compact('task', 'users', 'projects'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('admin.tasks.index')->with('toast_success', 'Task updated Successfully!');
    }

    public function updateS(Request $request, $id)
    {
        abort_if(Gate::denies('task_updateS'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $request->validate([
            'value' => 'required',
        ]);
        $task = Task::find($id);
        $task->value = $request->value;
        $task->save();
        return redirect()->route('admin.tasks.index')->with('toast_success', 'Statut updated Successfully!');
    }
    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->load('users');
        $task->load('projects');

        return view('admin.Tasks.Taches.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        Task::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
