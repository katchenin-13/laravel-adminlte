<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lbordereau extends Model
{
    use HasFactory;
    protected $fillable=[
        'prix',
        'quantite',
        'nom',
        'bordereau_id',
        'colis_id',
        ];


        public function bordereau()
        {
            return $this->belongsto(Bordereau::class);

        }

        public function colis()
        {
            return $this->belongsto(Colis::class);

        }

}
