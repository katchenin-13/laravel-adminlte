<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Models\Client;
use App\Models\Coursier;
use App\Models\Tarification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'nom',
        'commune_id',
    ];

    public function commune()
    {
        return $this->belongsTo(Commune::class);

    }
    public function coursier()
    {
        return $this->hasmany(Coursier::class);

    }

    public function tarification()
    {
        return $this->hasOne(Tarification::class);

    }

    public function client()
    {
        return $this->hasmany(Client::class);

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
