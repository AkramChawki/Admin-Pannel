@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.task.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $task->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nom de la tache
                                    </th>
                                    <td>
                                        {{ $task->Nom_tache }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <td>
                                        {{ $task->users->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date debut
                                    </th>
                                    <td>
                                        {{ $task->Date_debut }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date d'écheance
                                    </th>
                                    <td>
                                        {{ $task->Date_echeance }}
                                    </td>
                                </tr>
                                @if ($task->type === "Individual")
                                <tr>
                                    <th>
                                        Type
                                    </th>
                                    <td>
                                        {{ $task->type }}
                                    </td>
                                </tr>
                                @elseif ($task->type === "Projects")
                                <tr>
                                    <th>
                                        Type
                                    </th>
                                    <td>
                                        {{ $task->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Projet
                                    </th>
                                    <td>
                                        {{ $task->projects->Nom_projet }}
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>
                                        Jalon
                                    </th>
                                    <td>
                                        {{ $task->Jalon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        status
                                    </th>
                                    <td>
                                        {{ $task->value }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection