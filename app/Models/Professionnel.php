<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'cp',
        'ville',
        'telephone',
        'email',
        'naissance',
        'formation',
        'domaine',
        'source',
        'observation',
        'metier_id',
        'cv_path',
    ];

    // La méthode métier (au singulier) permet de trouver le métier auquel appartient (belongsTo) le professionnel
    public function metier(){
        return $this->belongsTo(Metier::class);
    }

    public function competences(){
        return $this->belongsToMany(Competence::class)->withTimestamps();
    }
}
