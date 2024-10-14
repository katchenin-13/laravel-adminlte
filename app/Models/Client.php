<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Models\Dossier;
use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'uuid',
        'nom',
        'prenom',
        'telephone',
        'email',
        'secteuract',
        'zone_id',
    ];

    public function zone()
    {
        return $this->belongsto(Zone::class);
    }

    public function paiement()
    {
        return $this->hasMany(Paiement::class);
    }

    public function dossier()
    {
        return $this->hasOne(Dossier::class);
    }

    // public function contrat()
    // {
    //     return $this->hasOne(Contrat::class);
    // }

    public function colis()
    {
        return $this->hasmany(Colis::class);

    }

    public function livraison()
    {
        return $this->hasmany(Livraison::class);

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

//     public function livraisons()
// {
//     return $this->hasMany(\App\Models\Livraison::class);
// }
}
