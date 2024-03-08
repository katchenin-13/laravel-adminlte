<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dossier;

class Client extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'secteur_activité',
        'zone_id',
    ];

    public function zone()
    {
        return $this->belongsto(Zone::class);
    }

    public function dossier()
    {
        return $this->hasOne(Dossier::class);
    }

    public function contrat()
    {
        return $this->hasOne(Contrat::class);
    }
}
