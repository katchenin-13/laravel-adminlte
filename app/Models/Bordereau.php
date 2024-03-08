<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bordereau extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'coursier_id',
        'nom_des'
    ];

    public function lbordereau()
    {
        return $this->hasMany(Lbordereau::class, );
    }

    public function coursier()
    {
        return $this->belongsto(Coursier::class, );
    }
}
