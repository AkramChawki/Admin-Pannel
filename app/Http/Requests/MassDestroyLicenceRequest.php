<?php

namespace App\Http\Requests;

use App\Models\Licence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLicenceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('licence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:licences,id',
        ];
    }
}
