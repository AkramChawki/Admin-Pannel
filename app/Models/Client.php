<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'Intitule',
        'Abrege',
        'Compte_collectif',
        'Interlocuteur',
        'Adresse',
        'Code_postal',
        'Ville',
        'Region',
        'Pays',
        'Telephone',
        'Email',
        'Site_web',
        'SIRET',
        'Code_NAF',
        'ID_TVA',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function licences()
    {
        return $this->hasMany(Licence::class);
    }
}
