<?php

namespace App\Http\Requests;

use App\Models\Licence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLicenceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('licence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'Nom_licence'     => [
                'required',
            ],
            'Date_achat'     => [
                'required',
            ],
            'Date_expir'     => [
                'required',
            ],
            'Code_licence'     => [
                'required',
            ],
            'type'     => [
                'required',
            ],
            'client_id'     => [
                'required',
            ],
        ];
    }
}
