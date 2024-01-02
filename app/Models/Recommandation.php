<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommandation extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'contenu',
        // Ajoutez d'autres champs si nécessaire
    ];

    // Si des relations avec d'autres modèles sont nécessaires, ajoutez-les ici
    // Par exemple, si une recommandation est liée à des actes de santé spécifiques ou à des pays

    /**
     * Relation avec le modèle ActeSante (si applicable).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function actesSante()
    {
        return $this->belongsToMany(ActeSante::class);
    }

    /**
     * Relation avec le modèle Pays (si applicable).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pays()
    {
        return $this->belongsToMany(Pays::class);
    }

    // Ajoutez d'autres méthodes ou relations si nécessaire
}
