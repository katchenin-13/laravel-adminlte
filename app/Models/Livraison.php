<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
    protected $fillable = [
        'jourlivraison',
        'coursier_id',
        'statut_id'
    ];

    public function coursier()
    {
        return $this->belongsto(Coursier::class);

    }

    public function statut()
    {
        return $this->belongsto(Statut::class);

    }

    public function colis()
    {
        return $this->hasMany(Colis::class);
    }
}
