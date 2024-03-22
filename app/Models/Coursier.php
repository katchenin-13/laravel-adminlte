<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursier extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'prenom', 'email', 'numero_telephone','numero_telephone_2', 'numero_permis_conduire',
        'type_vehicule', 'plaque_immatriculation', 'statut',
        'date_embauche', 'salaire','cni', 'photo','zones_id',
    ];

    public function Zone()
    {
        return $this->belongsto(Zone::class);

    }

    // public function sinistre()
    // {
    //     return $this->belongsto(sinsitre::class);

    // }

    public function livraison()
    {
        return $this->hasmany(Livraison::class);

    }

    public function colis()
    {
        return $this->belongsToMany(Colis::class);
    }

    public function bordereau()
    {
        return $this->hasmany(Bordereau::class);

    }
}
