<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'quantite',
        'categorie_id',
        'client_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function coursiers()
    {
        return $this->belongsToMany(Coursier::class, 'livraisons', 'colis_id', 'coursier_id');
    }
}
