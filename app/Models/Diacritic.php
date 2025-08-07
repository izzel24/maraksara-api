<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diacritic extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "symbol",
        "type",
        "latin_translit",
        "example"
    ];

}
