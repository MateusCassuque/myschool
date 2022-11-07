<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Escola;
use App\Models\Ciclo;
use App\Models\Classe;
use App\Models\Turma;
use App\Models\User;

class TurmaController extends Controller
{
    public function create($escola_id){

        $escolas = Escola::with('classes')->get();

        $id = $escola_id;

        if(count($escolas) != 0){

            foreach ($escolas as $escolaE) {
                if ($escolaE->id == $id) {
                    # Passando os dados da escola Logada
                    $escola = $escolaE;
                }
            }
        }else {
            # code...
            $escola = Escola::find($id);
        }



        return view('.escolas.classes_ciclo.create-turma',[
            'escola' => $escola
        ]);
    }
    public function store($escola_id, Request $request){

        $turma = new Turma;

        $turma->turmaName = $request->turma;
        $turma->turno = $request->turno;
        $turma->sala = $request->sala;
        $turma->classe_id = $request->classe;
        $turma->anoLectivo = $request->data;

        $turma->save();

        return redirect("/escolas/{$escola_id}/classes/{$request->classe}/show")->with('msg', "Turma nº {$turma->id}   criada com sucesso!");
    }
}
