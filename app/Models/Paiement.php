<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    public $fillable= [
        'uuid',
        'amount',
       ' client_id',
       'coursier_id',
       'livraison_id',
       'statut_id',
       'user_id',
       'colis_id',
    ];

    public function client()
    {

            return $this->belongsto(Client::class);

    }

    public function colis()
    {

            return $this->belongsto(Colis::class);

    }





    public function statut()
    {

            return $this->belongsto(Statut::class);

    }

    public function user()
    {

            return $this->belongsto(User::class);

    }

    public function coursier()
    {

            return $this->belongsto(Coursier::class);

    }


    public function livraison()
    {

            return $this->belongsto(Livraison::class);

    }



}
