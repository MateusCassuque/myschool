<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $casts = [
        'itens' => 'array'
    ];

    protected $guarded = [];

    #função para fazer a relação de um para muitos
    public function ciclos(){
        return $this->hasMany(Ciclo::class);
    }

    #função para fazer a relação de muitos para Um
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function classes(){
        return $this->hasManyThrough(
            Classe::class, Ciclo::class,
            'escola_id', 'ciclo_id', 'id'
        );
    }
}
