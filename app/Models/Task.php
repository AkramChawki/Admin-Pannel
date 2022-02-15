<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'Nom_tache',
        'user_id',
        'Date_debut',
        'Date_echeance',
        'type',
        'project_id',
        'Jalon',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
