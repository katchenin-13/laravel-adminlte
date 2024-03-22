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
        'coursier_id',
        'bordereau_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function coursiers()
    {
        return $this->belongsToMany(Coursier::class);
    }

    public function lbordereau()
    {
        return $this->hasMany(Lbordereau::class);
    }
}
