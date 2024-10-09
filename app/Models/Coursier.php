<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Coursier extends Authenticatable
{
    use HasFactory ;
    protected $fillable = [
        'uuid',
        'nom',
        'prenom',
        'email',
        'numero_telephone',
        'numero_permis_conduire',
        'plaque_immatriculation',
        'cni',
        'zone_id',
        'vehicule_id',
        'employer_id'
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);

    }

   public function user()
        {
            return $this->hasOneThrough(User::class, Coursuser::class, 'coursier_id', 'id', 'id', 'user_id');
        }

    public function employer()
    {
        return $this->belongsTo(Employer::class);

    }



    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);

    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // public function sinistre()
    // {
    //     return $this->belongsto(sinsitre::class);

    // }

    public function paiement()
    {
        return $this->hasMany(Paiement::class);
    }

    public function livraison()
    {
        return $this->hasMany(Livraison::class);
    }

    public function colis()
     {
        return $this->hasmany(Colis::class);
     }

    // public function colis()
    // {
    //     return $this->belongsToMany(Colis::class, 'livraisons', 'coursier_id', 'colis_id');
    // }

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
