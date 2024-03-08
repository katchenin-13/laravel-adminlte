<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable=[
    'montantT',
    'statut',
    'date',
    'facture'
    ];


    public function lfacture()
    {
        return $this->hasMany(Lfacture::class);

    }

    public function dossier()
    {
        return $this->belongsto(Dossier::class);

    }
}
