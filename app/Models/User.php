<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Ramsey\Uuid\Uuid;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use  HasRoles, HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function coursuser()
    // {
    //     return $this->hasOne(Coursuser::class);
    // }

    public function coursier()
    {
        return $this->hasOneThrough(Coursier::class, Coursuser::class,'user_id','id','id','coursier_id');
    }

    // public function coursier()
    // {
    //     return $this->hasOne(Coursier::class);
    // }


    // public function coursuser()
    // {
    //     return $this->belongsTo(Coursuser::class);
    // }

    public function manager()
    {
        return $this->hasOneThrough(Manager::class, Manuser::class,'user_id','id','id','manager_id');
    }
    // public function manager()
    // {
    //     return $this->hasmany(Manager::class , 'manuser');
    // }





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


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // $user = User::find($userId);


}






