<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    #função para fazer a relação de um para muitos
    public function municipios(){
        return $this->hasMany(Municipio::class);
    }

    public function paise(){
        return $this->belongsTo(Paise::class);
    }
}
