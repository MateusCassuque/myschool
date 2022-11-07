<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

     #fazendo a ligação de muitos para um com a tabela Ciclos
     public function ciclo(){
        return $this->belongsTo(Ciclo::class);
    }

     #fazendo a ligação de muitos para um com a tabela Ciclos
     public function turmas(){
        return $this->hasMany(Turma::class);
    }
}
