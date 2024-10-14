<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraison extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'destinataire',
        'numerodes',
        'adresse_livraison',
        'client_id',
        'coursier_id',
        'livraison_id',
        'statut_id'
    ];

    public function coursier()
    {
        return $this->belongsto(Coursier::class);

    }


    public function paiement()
    {
        return $this->hasMany(Paiement::class);
    }

    public function colis()
    {
        return $this->HasMany(Colis::class);

    }

    public function client()
    {
        return $this->belongsto(Client::class);

    }

    public function statut()
    {
        return $this->belongsto(Statut::class);

    }

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

//     public function client()
// {
//     return $this->belongsTo(\App\Models\Client::class);
// }
}
