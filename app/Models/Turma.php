<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $dates = ['date'];

     #fazendo a ligação de muitos para um com a tabela Ciclos
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
}
