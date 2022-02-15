<?php

namespace App\Http\Requests;


use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'Nom_projet'     => [
                'required',
            ],
            'Societe'    => [
                'required',
                'unique:users',
            ],
            'Responsable' => [
                'required',
            ],
            'Date_debut' => [
                'required',
            ],
            'Date_echeance' => [
                'required',
            ],
            'client_id'  => [
                'required',
            ],
            'users.*'  => [
                'integer',
            ],
            'users'    => [
                'required',
                'array',
            ],
        ];
    }
}
