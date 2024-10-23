<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;
    public $fillable= [
        'uuid',
        'montan_t',
        'année',
        'mois',
       'client_id',
       'statut_id',
    ];

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



}
