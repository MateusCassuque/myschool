@extends('layouts.main')

@section('title', $escola->name )

@section('bootstrapLink', '/assets/dist/css/bootstrap.min.css')
@section('jsPageLink', '/assets/dist/js/bootstrap.bundle.min.js')
@section('cssLink1', '/css/style.css')
@section('cssLink2', '/css/my_school.css')
@section('cssPaginaLink', '/css/createTurma.css')

@section('content')

@if(session('msg'))
    <p class="msg"> {{session('msg')}} </p>
@endif

    <div id="turma-create-container" class="col-md-6 offset-md-3">
        <h1>Criar Turma</h1>
        <form action="/escolas/{{$escola->id}}/turma" method="post" enctype="multipart/form-data">
        @csrf

            <div class="form-group">
                <label for="classe">Selecione classe</label>
                <div class="row">
                    <div class="col-md-6" id="classe-select">
                        <select name="classe" id="classe" class="form-control">
                        @foreach($escola->classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->classeName }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="data">Ano Lectivo:</label>
                <input type="date" name="data" id="data" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <label for="turma">Turma:</label>
                <input type="text" name="turma" id="turma" class="form-control" placeholder="Ex: A ,B / FC...">
            </div>
            <br>

            <div class="form-group">
                <label for="turno">Turno</label>
                <select name="turno" id="turno" class="form-control">
                    <option value="0">Manhã</option>
                    <option value="1">Tarde</option>
                    <option value="2">Noite</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="sala">Sala</label>
                <input type="text" name="sala" id="sala" class="form-control" placeholder="Número da Sala">
            </div>
            <br>



            <input type="submit" value="Adicionar Turma" class="btn btn-dark" id = "btn-adicionar-turma">
        </form>
    </div>

@endsection
