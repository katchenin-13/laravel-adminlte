<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    protected $fillable=[
        'uuid',
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

        protected static function boot()
        {
            parent::boot();
    
            static::creating(function ($user) {
                $user->uuid = static::generateUuid();
            });
        }
    
        protected static function generateUuid()
        {
            $uuid = base_convert(Uuid::uuid4()->getHex(), 16, 36);
            return substr($uuid, 0, 4);
        }
}
