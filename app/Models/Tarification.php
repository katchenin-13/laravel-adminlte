<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    use HasFactory;
    protected $fillable = [
        'prix'
    ];

    public function categorie()
    {
        return $this->belongsTo(Ctegorie::class);
    }
}
