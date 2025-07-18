<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translit extends Model
{
    use HasFactory;

    protected $fillable =[
        "aksara_batak_id",
        "dialect",
        "latin_translit",
        "example",
    ];

    public function aksaraBatak(){
        return $this->belongsTo(AksaraBatak::class);
    }
}
