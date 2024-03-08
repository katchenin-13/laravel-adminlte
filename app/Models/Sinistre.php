<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinistre extends Model
{
    use HasFactory;
    protected $fillable = [
        'dateA',
        'lieu',
        'statut'
    ];

    // public function coursier()
    // {
    //     return $this->hasmany(Coursier::class);

    // }
}
