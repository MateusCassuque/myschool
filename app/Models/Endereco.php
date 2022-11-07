<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;


    public function pessoas(){
        return $this->belongsToMany(Pessoa::class);
    }
}