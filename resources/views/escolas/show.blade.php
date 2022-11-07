@extends('layouts.navbarFooter')

@section('title', $escola->name)

@section('cssPaginaLink', '/css/show.css')

@section('content')

@if(session('msgEscola'))

<p class="msg"> {{session('msgEscola')}} </p>
<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-5">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded">
              <figure class="carousel-item">
                <img class = "img-fluid" src="/img/MySchoolLogoSobre1.png">
                <figcaption class=" d-none d-md-block">
                  <h5>My School</h5>
                  <p>Vá a escola sem sair de casa.</p>
                </figcaption>
              </figure>
              <figure class="carousel-item active">
                <img class ="img-fluid" src="/img/escolas/{{$escola->image}}">
              </figure>
            </div>
        </div>
    </div>

    <div id="info-container" class="col-5">
      @if($escola->private == 0)
        <p class="escola-puclica">
          <ion-icon src = "../fontes/Icones/ionicons/ios-star.svg"></ion-icon>
          Escola Pública
        </p>
      @elseif($escola->private == 1)
        <p class="escola-privada">
          <ion-icon src = "../fontes/Icones/ionicons/ios-star.svg"></ion-icon>
          Escola Privada
        </p>
      @else
        <p class="escola-comparticipada">
          <ion-icon src = "../fontes/Icones/ionicons/ios-star.svg"></ion-icon>
          Escola Comparticipada
        </p>
      @endif

      <h1> {{ $escola->name }} </h1>
      <p class = "local"><ion-icon name = "location-outline"></ion-icon>Localizada em {{ $escola->local }} </p>


      {{--bloco para inserir os ciclos--}}
      <form action="/escolas/ciclo/{{ $escola->id }}" method="POST">
        @csrf
        <div class="form-group" id = "ciclo-list">
          <label for="itens" id = "label-titulo">A escola Conta Com: </label>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value = "Ensino de Base"> Ensino de Base
          </div>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value = "Primeiro Ciclo"> Primeiro Ciclo
          </div>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value = "Segundo Ciclo"> Segundo Ciclo
          </div>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value = "Ensino Médio"> Ensino Médio
          </div>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value = "Ensino Superior"> Ensino Superior
          </div>
        </div>
        <a href="/escolas/ciclo/{{ $escola->id }}"
          class="btn btn-dark"
          id="escola-submit"
          onclick = "event.preventDefault();
          this.closest('form').submit();">
          <ion-icon class="icone-btn" src = "../fontes/Icones/ionicons/ios-save.svg"></ion-icon>
          Enviar
        </a>
      </form>
    </div>
</div>
@else




<div id="slide-principal" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item" style="background-image:url('/img/MySchoolLogoSobre1.png')">
            <div class="carousel-caption d-none d-md-block">
                <h5>My School</h5>
                <p>Vá a escola sem sair de casa.</p>
            </div>
        </div>

        <div class="carousel-item active" style="background-image:url('/img/escolas/{{$escola->image}}')">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$escola->name}}</h5>
                @if($escola->private == 0)
                    <p class="card-date"> Escola: Pública</p>
                @elseif($escola->private == 1)
                    <p class="card-date"> Escola: Privada</p>
                @else
                    <p class="card-date"> Escola: Comparticipada</p>
                @endif
            </div>
        </div>
    </div>
    <a href="#slide-principal" class="carousel-control-prev" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a href="#slide-principal" class="carousel-control-next" role="button" data-bs-slide="next">
        <span class="sr-only">Avançar</span>
        <span class="carousel-control-next-icon bg-dark"></span>
    </a>
</div>

<div class="container" id="corpo">
    <div class="row">
        <div class="col-12 text-center my-3" id="title-container">

            <h1 class="display-3"><i class="fa fa-podcast" aria-hiddem=true></i> {{ $escola->name }}</h1>
            <p class = "escola-city local"><ion-icon name = "location-outline"></ion-icon>Localizada em {{ $escola->local }} </p>

        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-3 ">
            <nav class="navbar navbar-light bg-light" id="navbar-vertical">
                <nav class="nav nav-pills flex-md-column">
                    <a href="#nav-home" class="nav-link">Home</a>

                    <a href="#nav-ciclos" class="nav-link">Curricularidade</a>

                    <a href="#nav-extracurricular" class="nav-link">Extracurricular</a>

                    <a href="#nav-sobre" class="nav-link">Sobre</a>
                </nav>
            </nav>
        </div>
        <div class="col-md-9">
            <div data-spy="scroll" data-target="#navbar-vertical" data-offset="0" class="scrollSpy-mychool">

                <div id="nav-home" class="conteudo">
                    <h4>Novidades</h4>
                    <p>novidades</p>
                </div>

                <div id="nav-ciclos" class="conteudo">
                    <h4>A Escola conta com:</h4>
                    <table class = "table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Ciclo</th>
                                <th scope="col">Turmas</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $classe)
                            <tr>
                                <td scrop=row>{{ $loop->index + 1 }}</td>
                                <td>{{$classe->classeName}}</td>
                                <td> {{$classe->ciclo->nivelName}} </td>
                                <td> {{count($classe->turmas)}} </td>
                                <td>
                                    <a href="/escolas/{{ $escola->id }}/classes/{{ $classe->id }}/show">
                                    Detalhes</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="nav-extracurricular" class="conteudo">
                    <h4>Actividades Extracurricular:</h4>
                    <ul class = "items-list">
                        @foreach($escola->itens as $item)
                        <li><p><ion-icon name="play-outline"></ion-icon>{{ $item }}</p></li>
                        @endforeach
                    </ul>
                </div>

                <div id="nav-sobre" class="conteudo">
                    <h4>Sobre a Instituição</h4>
                    <p>{{ $escola->description }}</p>

                </div>

            </div>
        </div>
    </div>
</div>
@endif
@endsection
