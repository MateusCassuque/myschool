@extends('layouts.navbarFooter')

@section('title', $escola->name)

@section('cssPaginaLink', '/css/showClasses.css')

@section('title', $escola->name)

@section('content')

<div class="col-md-10 offset-md-1">
    <div id="info-container">
        @if($escola->private == 0)
            <p class="escola-puclica">
                <ion-icon src = "../fontes/Icones/ionicons/ios-star.svg">
                </ion-icon>
                Escola Pública
            </p>
        @elseif($escola->private == 1)
            <p class="escola-privada">
                <ion-icon src = "../fontes/Icones/ionicons/ios-star.svg">
                </ion-icon>
                Escola Privada
            </p>
        @else
            <p class="escola-comparticipada">
                <ion-icon src = "../fontes/Icones/ionicons/ios-star.svg">
                </ion-icon>
                Escola Comparticipada
            </p>
        @endif
        <h1>{{ $escola->name }}</h1>
    </div>
    <div class="" id="">

        <h4>Classes:</h4>
        <div id="selecao">
            <form action="#" method="post">
            <div class="form-group">
                <select name="classe" id="classe" class="form-control">
                @foreach($escola->classes as $classe)
                    <option value="{{ $classe->id }}">
                        {{ $classe->classeName }}
                    </option>
                @endforeach
                </select>
            </div>
            </form>
        </div>

        <div class="" id="">
            <div class="" id="">
                <table class = "table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Turma</th>
                            <th scope="col">Classe</th>
                            <th scope="col">Ano Lectivo</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Sala</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($escola->classes as $classe)
                        @foreach($classe->turmas as $turma)
                        @if($classe->id == $classeSelected->id)
                            <tr>
                                <td scrop=row>{{ $loop->index + 1 }}</td>
                                <td> {{ $turma->turmaName }} </td>
                                <td>{{$classe->classeName}}</td>
                                <td>{{ date('Y', strtotime($turma->anoLectivo)) }}</td>

                                @if($turma->turno == 0)
                                    <td>Manhã</td>
                                @elseif($turma->turno == 1)
                                    <td>Tarde</td>
                                @elseif($turma->turno == 2)
                                    <td>Noite</td>
                                @else
                                    <td>Turno indefinido</td>
                                @endif

                                <td> {{ $turma->sala }} </td>
                            </tr>
                        @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
