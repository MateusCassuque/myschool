<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Escola;
use App\Models\Ciclo;
use App\Models\Classe;
use App\Models\User;

class ClasseController extends Controller
{
    public function show($escola_id,$classe_id){

        $escolas = Escola::with('classes')->get();

        foreach ($escolas as $escolaE) {
            if ($escolaE->id == $escola_id) {
                # Passando os dados da escola Logada
                $escola = $escolaE;
            }
            else{
                $escola = Escola::find($escola_id);
            }
        }

        $classeSelected = Classe::find($classe_id);

        return view('.escolas.classes_ciclo.showClasses',[
            'escola' => $escola, 'classeSelected' => $classeSelected
        ]);
    }
}
