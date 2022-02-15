<?php

namespace App\Http\Requests;

use App\Models\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'Nom_tache'     => [
                'required',
            ],
            'user_id'  => [
                'required',
            ],
            'Date_debut'    => [
                'required',
                'unique:users',
            ],
            'Date_echeance' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'project_id'  => [
                '',
            ],
            'Jalon' => [
                '',
            ],
            'status' => [
                '',
            ],
            'value' => [
                '',
            ],
        ];
    }
}