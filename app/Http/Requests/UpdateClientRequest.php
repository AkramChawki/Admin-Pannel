<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'Intitule' => [
                'required',
            ],
            'Abrege' => [
                'required',
            ],
            'Compte_collectif' => [
                'required',
            ],
            'Interlocuteur' => [
                'required',
            ],
            'Adresse' => [
                'required',
            ],
            'Code_postal' => [
                'required',
            ],
            'Ville' => [
                'required',
            ],
            'Region' => [
                'required',
            ],
            'Pays' => [
                'required',
            ],
            'Telephone' => [
                'required',
            ],
            'Email' => [
                'required',
            ],
            'Site_web' => [
                'required',
            ],
            'SIRET' => [
                'required',
            ],
            'Code_NAF' => [
                'required',
            ],
            'ID_TVA' => [
                'required',
            ],
        ];
    }
}
