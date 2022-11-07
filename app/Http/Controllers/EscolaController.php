<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Escola;
use App\Models\Ciclo;
use App\Models\Classe;
use App\Models\User;

class EscolaController extends Controller
{
    //Criando o método do controller que retorna a View Home;
    public function index(){

        $busca = request('search');


        if ($busca) {
            # Verificando se foi feito uma busca no input search

            #Usando o metódo where do Modell 'Escola' para fazer uma busca no banco
            $escolas = Escola::where([['name', 'like', '%' .$busca. '%']])->with('ciclos')->get();
        }else{
            # Traga todos os elementos caso não haja uma busca
            $escolas = Escola::with("ciclos")->get();
        }

        return view('welcome',[
        'escolas' => $escolas, 'busca' => $busca
        ]);
    }

    //Criando o método do controller que retorna a View de criar turma;
    public function create(){
        return view('escolas.create');
    }


    //Criando o método do controller que trata dos dados da criação da escola;
    public function store(Request $request){
        $escola = new Escola;

        $escola->name = $request->name;
        $escola->local = $request->local;
        $escola->description = $request->description;
        $escola->private = $request->private;
        $escola->itens = $request->itens;

        //Image Upload (Mandando Imagem no banco)
        if ($request->hasfile('image') && $request->file('image')->isValid()) {
            # if que verifica se o arquivo é válido ou não

            #passando o objecto imagem para uma váriavel
            $requestImage = $request->image;

            #pegando a extansão da imagem a partir da váriavel criada acima
            $extension = $requestImage->extension();

            #CRiando um nome único para a imagem, concatenando ele com a data actual e a extensão do arquivo
             $ImageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

             #Salvando a imagem na pasta dos arquivos do site
             $requestImage->move(public_path('/img/escolas'), $ImageName);

             #Mandando a imagem no banco de dados
             $escola->image = $ImageName;

        }
        #Passando o usuário logado para a váriavel $user com método auth() na propriedade user
        $user = auth()->user();
        $escola->user_id = $user->id;

        #Salvando os dados no banco
        $escola->save();

        #Usando o metódo where do Modell 'Escola' para fazer uma busca no banco
        $escolaCriadas = Escola::where([
            ['image', $ImageName]
            ])->get();

        $escolaNova = new EScola;

        foreach($escolaCriadas as $escolaCriada){
          $escolaNova = $escolaCriada;
        }

        return redirect("/escolas/{$escolaNova->id}")->with(
            'msgEscola',
            "Escola $escolaNova->name criada! preencha o formulário abaixo para concluir a operação com sucesso!"
        );
    }

    //Criando o método do controller que retorna a View Show do botão saber mais!;
    public function show($id){

        #fazendo pesquisa no banco apartir do metódo FindOrFail()

        $escola = Escola::findOrFail($id);

        $classes = $escola->classes;

        #Verificando se o usuário já confirmou a presensa na escolao ou não
        $user = auth()->user();

        return view('escolas.show', [
            'escola' => $escola,
            'classes' => $classes
        ]);
    }
}
