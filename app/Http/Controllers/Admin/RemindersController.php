<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReminderRequest;
use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Reminder;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemindersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reminder_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $Is_Admin = auth()->user()->roles->contains(function ($role) {
            return $role->pivot->role_id == 1;
        });

        if ($Is_Admin) {
            $reminders = Reminder::all();
        }else {
        $reminders = Reminder::where('user_id', auth()->user()->id)->get();
        }

        return view('admin.Tasks.Reminders.index', compact('reminders'));
    }

    public function create()
    {
        abort_if(Gate::denies('reminder_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();

        return view('admin.Tasks.Reminders.create', compact('users'));
    }

    public function store(StoreReminderRequest $request)
    {
        $reminder = Reminder::create($request->all());

        return redirect()->route('admin.reminders.index')->with('toast_success', 'Reminder Added Successfully!');
    }

    public function edit(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();
        $reminder->load('users');

        return view('admin.Tasks.Reminders.edit', compact('reminder', 'users'));
    }

    public function update(UpdateReminderRequest $request, Reminder $reminder)
    {
        $reminder->update($request->all());

        return redirect()->route('admin.reminders.index')->with('toast_success', 'Reminder Updated Successfully!');
    }

    public function updateS(Request $request, $id)
    {
        abort_if(Gate::denies('reminder_updateS'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $request->validate([
            'value' => 'required',
        ]);
        $reminder = Reminder::find($id);
        $reminder->value = $request->value;
        $reminder->save();
        return redirect()->route('admin.reminders.index')->with('toast_success', 'Statut updated Successfully!');
    }

    public function show(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reminder->load('users');

        return view('admin.Tasks.Reminders.show', compact('reminder'));
    }

    public function destroy(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reminder->delete();

        return back();
    }

    public function massDestroy(MassDestroyReminderRequest $request)
    {
        Reminder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
