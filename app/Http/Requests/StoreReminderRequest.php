<?php

namespace App\Http\Requests;

use App\Models\Reminder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreReminderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reminder_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'Nom_reminder'     => [
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
            'value' => [
                '',
            ],
        ];
    }
}
