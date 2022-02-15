@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.project.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $project->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nom projet
                                    </th>
                                    <td>
                                        {{ $project->Nom_projet }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Société
                                    </th>
                                    <td>
                                        {{ $project->Societe }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Résponsable
                                    </th>
                                    <td>
                                        {{ $project->Responsable }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date debut
                                    </th>
                                    <td>
                                        {{ $project->Date_debut }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date d'écheance
                                    </th>
                                    <td>
                                        {{ $project->Date_echeance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Client
                                    </th>
                                    <td>
                                        {{ $project->Clients->Intitule }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Users
                                    </th>
                                    <td>
                                        @foreach($project->users as $id => $users)
                                            <span class="label label-info label-many">{{ $users->name }}, </span>
                                        @endforeach
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