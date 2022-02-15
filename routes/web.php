<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectsController');

    // Tasks
    Route::post('/admin/tasks/{id}', 'TasksController@updateS')->name('tasks.updateS');
    Route::delete('tasks/destroy', 'TasksController@massDestroy')->name('tasks.massDestroy');
    Route::resource('tasks', 'TasksController');

    // reminders
    Route::post('/admin/reminders/{id}', 'RemindersController@updateS')->name('reminders.updateS');
    Route::delete('reminders/destroy', 'RemindersController@massDestroy')->name('reminders.massDestroy');
    Route::resource('reminders', 'RemindersController');

    // Licences
    Route::delete('licences/destroy', 'LicencesController@massDestroy')->name('licences.massDestroy');
    Route::resource('licences', 'LicencesController');
});
