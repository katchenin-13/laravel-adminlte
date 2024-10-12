<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colis extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'nom',
        'description',
        'quantite',
        'categorie_id',
        'livraison_id',
        'coursier_id',
        'client_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }

    public function coursier()
    {
        return $this->belongsTo(Coursier::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class);
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
