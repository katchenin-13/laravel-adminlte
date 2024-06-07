<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coursier extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->uuid = static::generateUuid();
        });
    }

    protected static function generateUuid()
    {
        $uuid = base_convert(Uuid::uuid4()->getHex(), 16, 36);
        return substr($uuid, 0, 4);
    }

}
