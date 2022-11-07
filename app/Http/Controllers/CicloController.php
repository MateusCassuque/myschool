<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Escola;
use App\Models\Ciclo;
use App\Models\Classe;
use App\Models\User;

class CicloController extends Controller
{
    public function create($id, Request $request){

        $userLog = auth()->user();

        $itens = $request->itens;

        if($userLog){

            $escola = Escola::findOrFail($id);

            foreach($itens as $item){
                #Percorrendo por todos os ciclos Selecionados pelo usuário

                $ciclo = new Ciclo;

                $ciclo->nivelName = $item;


                $ciclo->escola_id = $id;

                $ciclo->save();

                if($item == "Ensino de Base") {

                    $i = 0;
                    for ($contador = 0; $contador <= 4; $contador++){

                        $classe = new Classe;

                        if($contador == 0){

                            $classe->classeName = "Iniciação";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();

                        }elseif ($contador == 1){

                            $classe->classeName = "1ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 2){

                            $classe->classeName = "2ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 3){

                            $classe->classeName = "3ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                    }
                }

                if($item == "Primeiro Ciclo") {

                    $i = 0;
                    for ($contador = 0; $contador <= 3; $contador++){

                        $classe = new Classe;

                        if ($contador == 1){

                            $classe->classeName = "4ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 2){

                            $classe->classeName = "5ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 3){

                            $classe->classeName = "6ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                    }
                }

                if($item == "Segundo Ciclo") {

                    $i = 0;
                    for ($contador = 0; $contador <= 3; $contador++){

                        $classe = new Classe;

                        if ($contador == 1){

                            $classe->classeName = "7ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 2){

                            $classe->classeName = "8ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 3){

                            $classe->classeName = "9ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                    }
                }

                if($item == "Ensino Médio") {

                    $i = 0;
                    for ($contador = 0; $contador <= 3; $contador++){

                        $classe = new Classe;

                        if ($contador == 0){

                            $classe->classeName = "10ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 1){

                            $classe->classeName = "11ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 2){

                            $classe->classeName = "12ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                        elseif ($contador == 3){

                            $classe->classeName = "13ª classe";
                            $classe->ciclo_id = $ciclo->id;
                            $classe->save();
                        }
                    }
                }
            }
            return redirect("/escolas/{$id}");
        }
    }
}
