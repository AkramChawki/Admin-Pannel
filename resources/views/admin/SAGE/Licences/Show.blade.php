@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.licence.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.licence.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $licence->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nom de la licence
                                    </th>
                                    <td>
                                        {{ $licence->Nom_licence }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date d'achat
                                    </th>
                                    <td>
                                        {{ $licence->Date_achat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date d'expiration
                                    </th>
                                    <td>
                                        {{ $licence->Date_expir }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Code licence
                                    </th>
                                    <td>
                                        {{ $licence->Code_licence }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        type
                                    </th>
                                    <td>
                                        {{ $licence->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Client
                                    </th>
                                    <td>
                                        {{ $licence->Clients->Intitule }}
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