<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksaraBatak extends Model
{
    use HasFactory;

    protected $fillable = [
        "glyph"
    ];

    public function translit(){
        return $this->hasMany(Translit::class);
    }
}
