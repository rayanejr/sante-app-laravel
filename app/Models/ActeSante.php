<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActeSante extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'description',
        'cout_moyen',
        // Ajoutez d'autres champs si nécessaire
    ];

    // Ajoutez ici les méthodes pour les éventuelles relations
    // Par exemple, si un acte de santé est lié à un ou plusieurs pays

    /**
     * Relation avec le modèle Pays (si applicable).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pays()
    {
        return $this->belongsToMany(Pays::class);
    }

    // Vous pouvez ajouter d'autres méthodes ou relations si nécessaire
}
