<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Project;
use App\Models\Reminder;
use App\Models\Task;
use App\Models\User;

class HomeController
{
    public function index()
    {
        $Is_Admin = auth()->user()->roles->contains(function ($role) {
            return $role->pivot->role_id == 1;
        });

        if ($Is_Admin) {
            $tasks = Task::all();
        }else {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        }

        $Is_Admin = auth()->user()->roles->contains(function ($role) {
            return $role->pivot->role_id == 1;
        });

        if ($Is_Admin) {
            $reminders = Reminder::all();
        }else {
        $reminders = Reminder::where('user_id', auth()->user()->id)->get();
        }


        $projects = Project::all();

        $clients = Client::all();

        $users = User::all();
        
        return view('home',compact('projects', 'clients', 'users', 'tasks', 'reminders'));
    }
}
