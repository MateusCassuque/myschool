@extends('layouts.subNavbarLayout')

@section('pagStyle', '/css/perfil.css')


<!--Sessão dos  itens do menu lateral-->
@section('userType', 'Admin')

@if(session('msgUser'))
    <p class="msg"> {{session('msgEscola')}} </p>
@endif

@section('item1')
    <a href="#" tabindex="-1" id="drop" data-bs-toggle="dropdown" aria-expanded="true" class="nav-link">
        Contabilidade
    </a>
@endsection

@section('item2')
    @if($user->userAdmin == 1)
    <a href="#" tabindex="-1" id="drop" data-bs-toggle="dropdown" aria-expanded="true" class="nav-link">Funcionários</a>
        <ul class="dropdown-menu dropdown-menu-end bg-darkS" aria-labelledby="drop">
            <li><a class="dropdown-item list-group-item-dark text-dark" href="#"  tabindex="-1"   data-bs-toggle="modal" data-bs-target="">Funcionário</a>
            <li><a class="dropdown-item text-dark" href="#"  tabindex="-1"   data-bs-toggle="modal" data-bs-target="#logar">Inserir Funcionário</a>
            <li><hr class="dropdown-divider"></li>
            <li class="c">
                <a class="dropdown-item list-group-item-dark text-dark" href="#"  tabindex="-1"   data-bs-toggle="modal" data-bs-target="#logar" data-bs-toggle="modal" data-bs-target="#ajuda" >
                    Ajuda
                </a>
            </li>
        </ul>
    @endif
@endsection

@section('item3')
    @if($user->userAdmin == 1)
        <a href="#" tabindex="-1" id="drop" data-bs-toggle="dropdown" aria-expanded="true" class="nav-link">Curricular</a>
        <ul class="dropdown-menu dropdown-menu-end bg-darkS" aria-labelledby="drop">
            <li><a class="dropdown-item list-group-item-dark text-dark" href="#">Cursos e Classes</a>
            <li><a class="dropdown-item list-group-item-dark text-dark" href="#">Periódo</a></li>
            <li><hr class="dropdown-divider"></li>
            <li class="c">
                <a class="dropdown-item list-group-item-dark text-dark" href="#" data-bs-toggle="modal" data-bs-target="#ajuda" >
                Ajuda
                </a>
            </li>
        </ul>
    @endif
@endsection


@section('item4')
    <a href="#" tabindex="-1" id="drop" data-bs-toggle="dropdown" aria-expanded="true" class="nav-link">Extracurricular</a>
@endsection

<!--Sessão do conteudo central-->
@section('content')
    <p>Aqui entra o conteudo a pagina</p>


<!--Sessão do Modal dialog para cadastro de funcionário-->
<div class="modal fade" id="logar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
    <div  class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="logar">Cadastro de Funcionário</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span>&times;</span>
                </button>
                <!--img src="../../public/img/MySchoolLogoSobre1.png"-->
            </div>

            <!--form da modal logar-->
            <div class="modal-body" id="corpo">
                <form onChange="foto();" action="{{ route('registarFuncionario') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 separador" id="dados-usuario">
                        <div class="container-fluid">
                            <div class="row" id="">
                                <h3 class="navbar-brand" id="sub-titulo">Dados de Usuário</h3>

                                <div id="email" class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Por favor! E-mail_válido@teu-email.com">
                                </div>


                                <div class="form-group">
                                    <label for="password">Senha:</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="mínimo 8 caracteres, incluindo números">
                                </div>

                                <div class="form-group">
                                    <label for="conf-senha">Confirmar Senha:</label>
                                    <input type="password" name="conf-senha" id="conf-senha" class="form-control" placeholder="Confirme a Senha">
                                </div>



                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="checkbox" name="itens" value = "Educação Física">*
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">

                            <div class="form-group">
                                <a href="#foto-container" id="btn-nextFoto" class="btn btn-dark">Seguinte</a>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group separador" id="foto-container">
                        <h3 class="navbar-brand">Insira uma Foto para o Usuário:</h3>
                        <input type="file" name="image" id="fotocaminho" class="from-control-file"  onChange="foto();">
                        <img src="" alt="Foto do Usuário" class="img-fluid" id="foto1">

                        <div class="modal-footer">

                            <div class="form-group">
                                <a href="#dados-pessoais" id="btn-next-dados" class="btn btn-dark">Seguinte</a>
                                <a href="#dados-usuario" id="btn-voltar" class="btn btn-danger">voltar</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 separador" id="dados-pessoais">
                        <div class="container-fluid">
                            <div class="row" id="">
                                <h3 class="navbar-brand" id="sub-titulo">Dados Pessoais</h3>
                                <div class="col-8" id="">

                                    <div class="row" id="">

                                        <div class="col-md-8" id="nome">
                                            <div class="form-group">
                                                <label for="name">Nome completo:</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nome do funcionário">
                                            </div>
                                        </div>

                                        <div class="col-md-4 m-0" id="data-nascimento">
                                            <div class="form-group">
                                                <label for="dataNascimento">Data Nascimento:</label>
                                                <input type="date" name="dataNascimento" id="dataNascimento" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row" id="">
                                        <div class="col-5 form-group" id="">
                                            <label for="estado_sivil">Estado Sivil</label>
                                            <select name="estado_sivil" id="estado_sivil" class="form-control">
                                                <option value="0">Solteiro</option>
                                                <option value="1">Casado</option>
                                                <option value="2">Namorando</option>
                                            </select>
                                        </div>

                                        <div class="col-7 form-group" id="">
                                            <label for="bi_numero">Nº identificação</label>
                                            <input type="text" name="bi_numero" id="bi_numero" class="form-control" placeholder="Nº. de identificação pessoal">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4" id="">
                                    <div class="" id=""></div>
                                    <div class="form-group">
                                        <label for="image">Foto do Funcionário</label>
                                        <img src="/img/df.jpg" alt="" class="" id="foto">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="endereco">Endereço:</label>
                                <div id="" class="row m-0">
                                <div id="pais" class="col-4 col-md-3">
                                        <input type="text" name="pais" id="pais" class="form-control" placeholder="*Pais">
                                    </div>

                                    <div id="provincia" class="col-4 col-md-3">
                                        <input type="text" name="provincia" id="provincia" class="form-control" placeholder="*Província">
                                    </div>

                                    <div id="municipio" class="col-4 col-md-3">
                                        <input type="text" name="municipio" id="municipio" class="form-control" placeholder="*Munincípio">
                                    </div>

                                    <div id="bairro" class="col-4 col-md-3">
                                                <input type="text" name="bairro" id="bairro" class="form-control" placeholder="*Bairro">
                                    </div>
                                    <div id="rua" class="col-4 col-md-3">
                                        <input type="text" name="rua" id="rua" class="form-control" placeholder="*Rua">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div id="residencia" class="col-4 col-md-3">
                                        <input type="text" name="residencia" id="residencia" class="form-control" placeholder="*Residência Nº">
                                    </div>
                                <label for="descricao">Descrição:</label>
                                <textarea onInput="foto()" type="text" name="descricao" id="descricao" class="form-control" placeholder="Sobre a escola" oninput="alert();"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <input type="checkbox" name="itens" value = "Educação Física">*
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group">
                            <a href="#cargo-container" id="btn-next-dados" class="btn btn-dark">Seguinte</a>
                                <a href="#foto-container" id="btn-voltar" class="btn btn-danger">voltar</a>
                            </div>
                        </div>
                    </div>


                    <div class="form-group separador" id="cargo-container">
                        <h3 class="navbar-brand">Dados do Funcionário:</h3>

                        <div class="col-5 form-group" id="">
                            <label for="estado_sivil">Função</label>
                            <select name="estado_sivil" id="estado_sivil" class="form-control">
                                <option value="1">Professor</option>
                                <option value="2">Secretária</option>
                                <option value="3">Tesourária</option>
                            </select>
                        </div>

                        <div class="row">

                            <div class="col-5 m-0" id="data-comeco">
                                <div class="form-group">
                                    <label for="dataComeco">Começou em:</label>
                                    <input type="date" name="dataComeco" id="dataComeco" class="form-control">
                                </div>
                            </div>

                            <div class="col-5 m-0" id="data-comeco">
                            <div class="form-group">
                                <label for="datafim">Rescinde em:</label>
                                <input type="date" name="datafim" id="datafim" class="form-control">
                            </div>
                            </div>
                        </div>



                        <div class="col-5 m-0" id="data-comeco">
                            <div class="form-group">
                                <label for="enviar-cv">*Enviar CV:</label>
                                <input type="file" name="enviar-cv" id="enviar-cv" class="from-control-file"  onChange="foto();">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group">
                                <input type="submit" value="Enviar" class="btn btn-dark" id ="botao">
                                <a href="#dados-pessoais" id="btn-voltar" class="btn btn-danger">voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
