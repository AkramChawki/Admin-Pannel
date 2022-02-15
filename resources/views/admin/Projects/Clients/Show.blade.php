@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.client.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $client->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Intitulé
                                    </th>
                                    <td>
                                        {{ $client->Intitule }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Adresse
                                    </th>
                                    <td>
                                        {{ $client->Adresse }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Ville
                                    </th>
                                    <td>
                                        {{ $client->Ville }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Pays
                                    </th>
                                    <td>
                                        {{ $client->Pays }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Téléphone
                                    </th>
                                    <td>
                                        {{ $client->Telephone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        E-mail
                                    </th>
                                    <td>
                                        {{ $client->Email }}
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