<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    protected $fillable=[
      'nom',
      'client_id'
        ];


        public function facture()
        {
            return $this->hasMany(Facture::class);

        }

        public function client()
        {
            return $this->belongsto(Client::class);

        }
}
