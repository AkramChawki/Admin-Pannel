<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    use SoftDeletes;

    public $table = 'reminders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'Nom_reminder',
        'user_id',
        'Date_debut',
        'Date_echeance',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
