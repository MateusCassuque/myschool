<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paise extends Model
{
    use HasFactory;

    #função para fazer a relação de um para muitos
    public function provincias(){
        return $this->hasMany(Provincia::class);
    }
}
