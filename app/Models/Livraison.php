<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
    protected $fillable = [
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
}
