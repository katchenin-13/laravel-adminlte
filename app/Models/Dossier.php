<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dossier extends Model
{
    use HasFactory;
    protected $fillable=[
        'uuid',
      'nom',
      'client_id'
        ];



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
