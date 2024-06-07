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
        'coursier_id',
        'colis_id',
        'statut_id'
    ];

    public function coursier()
    {
        return $this->belongsto(Coursier::class);

    }

    public function colis()
    {
        return $this->belongsto(Colis::class);

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
}
