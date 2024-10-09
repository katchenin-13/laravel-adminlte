<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coursuser extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'coursier_id',
        'user_id'
    ];


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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coursier()
    {
        return $this->belongsTo(Coursier::class);
    }


}
