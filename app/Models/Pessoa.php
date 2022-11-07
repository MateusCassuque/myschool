<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = "Pessoas";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function enderecos(){
        return $this->belongsToMany(Endereco::class);
    }
}
