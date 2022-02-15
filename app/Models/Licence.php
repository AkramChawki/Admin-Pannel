<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Licence extends Model
{
    use SoftDeletes;

    public $table = 'licences';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'Nom_licence',
        'Date_achat',
        'Date_expir',
        'Code_licence',
        'type',
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
