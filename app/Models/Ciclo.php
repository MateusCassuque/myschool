<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;

    #fazendo a ligação de muitos para muitos com a tabela Escola

    public function escolas(){
        return $this->belongsTo(Escola::class);
    }
    #fazendo a ligação de um para muito com a tabela Classes
    public function classes(){
        return $this->hasMany(Classe::class);
    }
}
