@extends('layouts.navbarFooter')

@section('title', 'My School / Sobre')

@section('cssPaginaLink', '/css/show.css')

@section('content')

@if(session('msgEscola'))

@endif

    <form action="/sbstore" method="POST">
    @csrf

    <h1>Esta é a página de Sobre, está sendo usada para testes</h1>

<div class="container-fluid">
    <div class="row" id="">
        <h3 class="navbar-brand" id="sub-titulo">Dados Pessoais</h3>
        <div class="col-8" id="">

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
    </div>

    <div class="form-group">

        <label for="endereco">Endereço:</label>

        <div id="" class="row">

            <div id="pais" class="col-4 col-md-3">
                <input type="text" name="pais" id="pais" class="form-control" placeholder="*Pais">
            </div>

            <div id="provincia" class="col-4 col-md-3">
                <input type="text" name="provincia" id="provincia" class="form-control" placeholder="*Província">
            </div>

            <div id="municipio" class="col-4 col-md-2">
                <input type="text" name="municipio" id="municipio" class="form-control" placeholder="*Munincípio">
            </div>

            <div id="bairro" class="col-4 col-md-2">
                        <input type="text" name="bairro" id="bairro" class="form-control" placeholder="*Bairro">
            </div>
            <div id="rua" class="col-4 col-md-2">
                <input type="text" name="rua" id="rua" class="form-control" placeholder="*Rua">
            </div>
        </div>
    </div>

    <div class="row mb-10">
        <div class="col-4">
            <label for="rezidencia">Residencia:</label>
            <input type="text" name="rezidencia" id="rezidencia" class="form-control" placeholder="*casa nº">
        </div>
        <div class="form-group col-8">
            <label for="description">Descrição:</label>
            <textarea onInput="foto()" type="text" name="description" id="description" class="form-control" placeholder="Sobre a escola" oninput="alert();"></textarea>
        </div>
    </div>

</div>

<div class="modal-footer">
    <div class="form-group">
        <input type="submit" value="Enviar" class="btn btn-dark" id ="botao">
    </div>
</div>
</div>

</form>


<a href="/">Voltar para Home</a>
@endsection
