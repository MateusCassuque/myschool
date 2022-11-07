@extends('layouts.navbarFooter')

@section('cssPaginaLink', '/css/style.css')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crir Escola</h1>
        <form action="/escolas" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group opsao">
                <label for="image">Imagem da Escola</label>
                <input type="file" name="image" id="image" class="from-control-file">
            </div>

            <div class="form-group opsao">
                <label for="name">Escola:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nome da Escola">
            </div>

            <div class="form-group opsao">
                <label for="local">Endereço:</label>
                <input type="text" name="local" id="local" class="form-control" placeholder="Província / munincípio / bairro / rua">
            </div>

            <div class="form-group opsao">
                <label for="private">Estatúto</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Pública</option>
                    <option value="1">Privada</option>
                    <option value="2">Comparticipada</option>
                </select>
            </div>

            <div class="form-group opsao">
                <label for="description">Descrição:</label>
                <textarea type="text" name="description" id="description" class="form-control" placeholder="Sobre a escola"></textarea>
            </div>

            <div class="form-group opsao">
                <label for="itens">Extracurricular:</label>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value = "Educação Física"> Educação Física
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value = "Campionato Escolar"> Campionato Escolar
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value = "Aula de Natação"> Aula de Natação
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value = "Curso de Planos de feria"> Curso de Planos de feria
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value = "Acampamento Escolar"> Acampamento Escolar
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value = "Festival de Música"> Festival de Música
                </div>
            </div>

            <div class="form-group opsao">
                <input type="submit" value="Enviar" class="btn btn-dark" id ="botao">
            </div>
        </form>
    </div>
@endsection
