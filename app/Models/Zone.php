<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Coursier;
use App\Models\Tarification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
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
}
