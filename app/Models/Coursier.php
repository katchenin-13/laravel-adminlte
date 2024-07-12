<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Coursier extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'uuid',
        'nom',
        'prenom',
        'email',
       ' password',
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);

    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);

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
