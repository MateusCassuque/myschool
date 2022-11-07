<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

use App\Models\Escola;
use App\Models\Ciclo;
use App\Models\Classe;
use App\Models\User;
use App\Models\Pessoa;

use App\Models\Endereco;
use App\Models\EnderecoPessoa;
use App\Classes\UserEndereco;

class UserController extends Controller
{
    public function index(){
        $user = auth()->user();

        #Usando o metódo where do Modell 'Escola' para fazer uma busca no banco
        $escolas = Escola::where([['user_id', $user->id ]])->with('ciclos')->get();

        return view('.user.curricular',[
            'user' => $user, 'escolas' => $escolas
        ]);
    }

    public function dashboard(){
        $user = auth()->user();

        return view('dashboard',[
            'user' => $user
        ]);
    }


    //Metódo Store, para o processamento dos dados
    public function store(Request $request){
        $userNovo = new User;

        $userNovo->name = $request->name;
        $userNovo->email = $request->email;
        $userNovo->password = Hash::make($request->password);

        if ($request->hasfile('image') && $request->file('image')->isValid()) {
            # if que verifica se o arquivo é válido ou não

            #passando o objecto imagem para uma váriavel
            $requestImage = $request->image;

            #pegando a extansão da imagem a partir da váriavel criada acima
            $extension = $requestImage->extension();

            #CRiando um nome único para a imagem, concatenando ele com a data actual e a extensão do arquivo
             $ImageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

             #Salvando a imagem na pasta dos arquivos do site
             $requestImage->move(public_path('/img/users'), $ImageName);

             #Mandando a imagem no banco de dados
             $userNovo->profile_photo_path = $ImageName;
        }

        $userNovo->save();

        $novoUsers = User::where([
            ['profile_photo_path', $ImageName]
        ])->get();

        $user = new User;
        foreach($novoUsers as $novoUser){
            $user = $novoUser;
        }

        $pessoaNova = new Pessoa;

        $pessoaNova->nomeCompleto = $request->name;
        $pessoaNova->dataNascimento = $request->dataNascimento;
        $pessoaNova->numero_BI  = $request->bi_numero;
        $pessoaNova->user_id = $user->id;

        $pessoaNova->save();

        $pessoaAchada = new Pessoa;

        $pessoas = Pessoa::where([['numero_BI', $pessoaNova->numero_BI ]])->get();
            foreach($pessoas as $pessoa){
                $pessoaAchada = $pessoa;
            }

        $enderecoPessoa = new EnderecoPessoa;
        $endereco = new UserEndereco;
        $retornoMetodo = $endereco->store($request);
        $enderecoCriado = $retornoMetodo;

        $enderecoPessoa->residencia = $request->residencia;
        $enderecoPessoa->descricao = $request->descricao;
        $enderecoPessoa->endereco_id = $enderecoCriado->id;
        $enderecoPessoa->pessoa_id = $pessoaAchada->id;

        $enderecoPessoa->save();

     //   $user->eventsAsParticipant()->attach($id);

        return redirect("/dashboard")->with('msgUser',
            "Funcionário Cadastrado com Sucesso!"
        );
    }
}
