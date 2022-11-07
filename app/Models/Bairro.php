<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    #função para fazer a relação de um para muitos
    public function ruas(){
        return $this->hasMany(Rua::class);
    }

    public function municipios(){
        return $this->belongsTo(Municipio::class);
    }
}
