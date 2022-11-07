<?php

namespace App\Classes;

use Illuminate\Http\Request;


use App\Models\Paise;
use App\Models\Provincia;
use App\Models\Municipio;
use App\Models\Bairro;
use App\Models\Rua;
use App\Models\Endereco;

class UserEndereco{

    public function store(Request $request){

        $paisNovo = new Paise;
        $pais = new Paise;

        $provinciaNovo = new Provincia;
        $provincia = new Provincia;

        $municipioNovo = new Municipio;
        $municipio = new Municipio;

        $bairroNovo = new Bairro;
        $bairro = new Bairro;

        $ruaNovo = new Rua;
        $rua = new Rua;

        $enderecoNovo = new Endereco;
        $endereco = new Endereco;



        $paises = Paise::where([['paisName', $request->pais ]])->get();
        $conta = 0;
        foreach($paises as $paise){
            $pais = $paise;
            $conta += 1;
        }

        if($conta == 0){
            $paisNovo->paisName = $request->pais;
            $paisNovo->save();

            $paises = Paise::where([['paisName', $request->pais ]])->get();
            foreach($paises as $paise){
                $pais = $paise;
            }
        }

        $provincias = Provincia::where([['provinciaName', $request->provincia ]])->get();
        $conta = 0;
        foreach($provincias as $provinciaEncontrada){
            $provincia = $provinciaEncontrada;
            $conta += 1;
        }
        if($conta == 0){
            $provinciaNovo->provinciaName = $request->provincia;
            $provinciaNovo->paise_id = $pais->id;
            $provinciaNovo->save();

            $provincias = Provincia::where([['provinciaName', $request->provincia ]])->get();
            foreach($provincias as $provinciaEncontrada){
                $provincia = $provinciaEncontrada;
            }
        }

        $municipios = Municipio::where([['municipioName', $request->municipio ]])->get();
        $conta = 0;
        foreach($municipios as $municipioEncontrado){
            $municipio = $municipioEncontrado;
            $conta += 1;
        }
        if($conta == 0){
            $municipioNovo->municipioName = $request->municipio;
            $municipioNovo->provincia_id = $provincia->id;
            $municipioNovo->save();

            $municipios = Municipio::where([['municipioName', $request->municipio ]])->get();
            foreach($municipios as $municipioEncontrado){
                $municipio = $municipioEncontrado;
            }
        }

        $bairros = Bairro::where([['bairroName', $request->bairro ]])->get();
        $conta = 0;
        foreach($bairros as $bairroEncontrado){
            $bairro = $bairroEncontrado;
            $conta += 1;
        }
        if($conta == 0){
            $bairroNovo->bairroName = $request->bairro;
            $bairroNovo->municipio_id = $municipio->id;
            $bairroNovo->save();

            $bairros = Bairro::where([['bairroName', $request->bairro ]])->get();
            foreach($bairros as $bairroEncontrado){
                $bairro = $bairroEncontrado;
            }
        }



        $ruas = Rua::where([['ruaName', $request->rua ]])->get();
        $conta = 0;
        foreach($ruas as $ruaEncontrada){
            $rua = $ruaEncontrada;
            $conta += 1;
        }
        if($conta == 0){
            $ruaNovo->ruaName = $request->rua;
            $ruaNovo->bairro_id = $bairro->id;
            $ruaNovo->save();

            $ruas = Rua::where([['ruaName', $request->rua ]])->get();
            foreach($ruas as $ruaEncontrada){
                $rua = $ruaEncontrada;
            }
        }

        $enderecos = Endereco::all();
        $conta = 0;
        foreach($enderecos as $enderecoEncontrado){
            if($enderecoEncontrado->paise_id == $pais->id){

                if($enderecoEncontrado->provincia_id == $provincia->id){
                    if($enderecoEncontrado->municipio_id == $municipio->id){
                        if($enderecoEncontrado->bairro_id == $bairro->id){
                            if($enderecoEncontrado->rua_id == $rua->id){
                                $endereco = $enderecoEncontrado;
                                $conta += 1;
                            }
                        }
                    }
                }
            }
        }

        if($conta == 0){
            $enderecoNovo->paise_id = $pais->id;
            $enderecoNovo->provincia_id = $provincia->id;
            $enderecoNovo->municipio_id = $municipio->id;
            $enderecoNovo->bairro_id = $bairro->id;
            $enderecoNovo->rua_id = $rua->id;

            $enderecoNovo->save();

            $enderecos = Endereco::all();
            foreach($enderecos as $enderecoEncontrado){
                if($enderecoEncontrado->paise_id == $pais->id){

                    if($enderecoEncontrado->provincia_id == $provincia->id){
                        if($enderecoEncontrado->municipio_id == $municipio->id){
                            if($enderecoEncontrado->bairro_id == $bairro->id){
                                if($enderecoEncontrado->rua_id == $rua->id){
                                    $endereco = $enderecoEncontrado;
                                }
                            }
                        }
                    }
                }
            }
        }

       return $endereco;
    }

}
