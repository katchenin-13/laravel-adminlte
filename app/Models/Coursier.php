<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursier extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numero_telephone',
        'numero_telephone_2',
        'numero_permis_conduire',
        'plaque_immatriculation',
        'statut',
        'date_embauche',
        'salaire',
        'cni',
        'photo',
        'zone_id',
        'vehicule_id',
    ];

    public function zone()
    {
        return $this->belongsto(Zone::class);

    }

    public function vehicule()
    {
        return $this->belongsto(Vehicule::class);

    }

    // public function sinistre()
    // {
    //     return $this->belongsto(sinsitre::class);

    // }

    public function colis()
    {
        return $this->belongsToMany(Colis::class, 'livraisons', 'coursier_id', 'colis_id');
    }

    // public function bordereau()
    // {
    //     return $this->hasmany(Bordereau::class);

    // }

}
