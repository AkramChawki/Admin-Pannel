<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'Nom_projet',
        'Societe',
        'Responsable',
        'Date_debut',
        'Date_debut',
        'Date_echeance',
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project', 'project_id', 'user_id');
    }
    
    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
