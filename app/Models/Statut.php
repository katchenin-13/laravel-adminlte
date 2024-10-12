<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statut extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nom',
        'statut_type'
    ];


    public function livraison()
    {
        return $this->hasmany(Livraison::class);
    }

    public function paiement()
    {
        return $this->hasmany(Paiement::class);
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
