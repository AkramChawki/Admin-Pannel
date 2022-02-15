@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.reminder.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reminder.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $reminder->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nom reminder
                                    </th>
                                    <td>
                                        {{ $reminder->Nom_reminder }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date debut
                                    </th>
                                    <td>
                                        {{ $reminder->Date_debut }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date échéance
                                    </th>
                                    <td>
                                        {{ $reminder->Date_echeance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <td>
                                        {{ $reminder->users->name }}
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