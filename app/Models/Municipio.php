<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    #função para fazer a relação de um para muitos
    public function bairros(){
        return $this->hasMany(Bairro::class);
    }

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }
}
