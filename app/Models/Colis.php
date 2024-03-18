<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    use HasFactory;
    protected $fillable = [
        'categorie',
        'coursier_id',
        'bordereau_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Ctegorie::class);
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
