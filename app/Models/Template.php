<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /** @use HasFactory<\Database\Factories\TemplateFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'description',
        'prix',
        'statut',
        'categorie',
        'langage',
        'telechargement',
        'note',
        'image',
        'dossier',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
