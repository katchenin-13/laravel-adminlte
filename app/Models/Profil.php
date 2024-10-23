<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;
    public $fillable=[
        'uuid',
        'photo',
        'pseudo',
        'user_id'

    ];

/**
      * Get the user that owns the Profil
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function user()
     {
         return $this->belongsTo(User::class,);
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
