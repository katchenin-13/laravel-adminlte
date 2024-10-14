<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class manager extends Model
{
    use HasFactory;
    protected $fillable=[
        'uuid',
        'nom',
       'prenom',
       'numero_telephone',
       'numero_telephone_2',
       'email',
       'employer_id'
        ];


        public function user()
        {
            return $this->hasOneThrough(User::class, 'manager_id','id', 'id','user_id');
        }

        public function employer()
        {
            return $this->belongsto(Employer::class);

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
