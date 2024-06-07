<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;
    protected $fillable=[
        'uuid',
    'montantT',
    'statut',
    'date',
    'facture'
    ];


    public function lfacture()
    {
        return $this->hasMany(Lfacture::class);

    }

    public function dossier()
    {
        return $this->belongsto(Dossier::class);

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
