<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;
    public $fillable= [
        'uuid',
        'amount',
       ' client_id',
       'coursier_id',
       'livraison_id',
       'statut_id',
    ];
    public function client()
    {

            return $this->belongsto(Client::class);

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
