<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
    protected $fillable = [
        'statut',
        'jourlivraison',
        'coursier_id'
    ];

    public function coursier()
    {
        return $this->belongsto(Coursier::class);

    }

    public function colis()
    {
        return $this->hasMany(Colis::class);
    }
}
