@extends('layouts.navbarFooter')

@section('cssPaginaLink', '/css/style.css')

@section('title', 'My School')

<!-- codigo para a barra de pesquisa-->
@section('pesquisa')
<form action="/" method="get" class = "d-flex form-inline" id="pesquisar">
    @csrf
    <input class="form-control me-2" type="search" name="search" placeholder="Procurar Escola" aria-label="Search">
    <button class="btn btn-outline-warning" type="submit">Buscar</button>
</form>


@endsection

@section('content')
<!--codigo corpo da my school-->
<!--codigo da publicadade da my school-->
<div id="slide-principal" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" id="coural-container">
        <div class="carousel-item active"  style="background-image:url('../img/MySchoolLogoSobre1.png'); background-color: black;">
            <div class="carousel-caption d-none d-md-block">
                <h5>My School</h5>
                <p>Vá a escola sem sair de casa.</p>
            </div>
        </div>
        @foreach($escolas as $escola)
        <div class="carousel-item" id="coural-banner" style="background-image:url('/img/escolas/{{$escola->image}}')">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$escola->name}}</h5>
                <p>{{$escola->local}}.</p>
            </div>
        </div>
        @endforeach
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

<!--codigo da divisão  de rows-->
    <div class="row">
        <main class="p-3 rounded">
            <nav>
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab"
                        data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true">
                        Home
                    </button>

                    @if($busca)
                        @if(count($escolas) != 0)
                             <button class = 'nav-link'
                        id='nav-tab1-tab'
                        data-bs-toggle='tab'
                        data-bs-target='#nav-tab1' type='button' role='tab'
                        aria-controls='nav-tab1'
                        aria-selected='false'>Ensino de Base
                    </button>

                    <button class = 'nav-link'
                        id='nav-tab2-tab'
                        data-bs-toggle='tab'
                        data-bs-target='#nav-tab2' type='button' role='tab'
                        aria-controls='nav-tab2'
                        aria-selected='false'>Primeiro Ciclo
                    </button>

                    <button class = 'nav-link'
                        id='nav-tab3-tab'
                        data-bs-toggle='tab'
                        data-bs-target='#nav-tab3' type='button' role='tab'
                        aria-controls='nav-tab3'
                        aria-selected='false'>Segundo Ciclo
                    </button>

                    <button class = 'nav-link'
                        id='nav-tab4-tab'
                        data-bs-toggle='tab'
                        data-bs-target='#nav-tab4' type='button' role='tab'
                        aria-controls='nav-tab4'
                        aria-selected='false'>Ensino Médio
                    </button>

                    <button class = 'nav-link'
                        id='nav-tab5-tab'
                        data-bs-toggle='tab'
                        data-bs-target='#nav-tab5' type='button' role='tab'
                        aria-controls='nav-tab5'
                        aria-selected='false'>Ensino Superior
                    </button>
                        @endif
                    @endif
                </div>
            </nav>
        </main>
    </div>
    <!--codigo da publicadades gerais e pedidas-->
    <div class="row">
        <div class="col-12">
            <main class="">
                <div class="tab-content" id="nav-tabContent">
                    <!--primeira parte-->
                    @if($busca)
                    <h2 class="border-bottom">Buscando por: {{$busca}} </h2>
                    @if(count($escolas) == 0)
                    <p class="subtitulo">Nenhuma escola foi encontrada!</p>
                    @else
                    <p class="subtitulo">Escolas encontradas: </p>
                    @endif
                    @else
                    <h2 class = "border-bottom">Nossas Escolas</h2>
                    @endif
                    <div class="tab-pane show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @if(count($escolas) == 0)
                            <p class="subtitulo">Nenhuma escola foi registrada! <a href = "{{ route('criarEscola') }}">Registrar Escola</a></p>
                        @else
                            <p class="subtitulo">Veja as escolas próximas de você</p>
                        @endif

                        <div class="row">
                            @forelse($escolas as $escola)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="/img/escolas/{{ $escola->image }}" alt="" class="card-img-top img-fluid">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$escola->name}}</h4>

                                        @if($escola->private == 0)
                                                <h6 class="card-subtitle mb-2 text-muted">Escola Pública</h6>
                                            @elseif($escola->private == 1)
                                                <h6 class="card-subtitle mb-2 text-muted">Escola Privada</h6>
                                            @else
                                                <h6 class="card-subtitle mb-2 text-muted"> Escola Comparticipada</h6>
                                            @endif
                                            <a href="/escolas/{{ $escola->id }}" class="card-link btn btn-dark btn-lg">Saber Mais</a>
                                        </div>
                                        <div class="card-footer text-muted">
                                            Entra em contacto conosco. &nbsp; &copy; 2021
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>Nenhuma escola foi encontrada!</p>
                                @endforelse
                        </div>
                    </div>

                    {{-- Parte do painel de pesquisas... --}}

                    <div class="tab-pane fade" id ="nav-tab1" role="tabpanel" aria-labelledby ="nav-tab1-tab">
                        <ul class = "items-list" id = "card-list">
                            @foreach($escolas as $escola)
                                @foreach($escola->ciclos as $ciclo)
                                    @if($ciclo->nivelName == "Ensino de Base")
                                    <li>
                                    <div class="card">
                                        <img src="/img/escolas/{{ $escola->image }}" alt="{{ $escola->name }}">
                                        <div class="card-body">
                                            @if($escola->private == 0)
                                            <p class="card-date"> Escola: Pública</p>
                                            @elseif($escola->private == 1)
                                            <p class="card-date"> Escola: Privada</p>
                                            @else
                                            <p class="card-date"> Escola: Comparticipada</p>
                                            @endif
                                            <h5 class="card-title"> {{$escola->name}} </h5>
                                            <a href="/escolas/{{ $escola->id }}" class="btn btn-dark">Saber mais</a>
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane fade" id ="nav-tab2" role="tabpanel" aria-labelledby ="nav-tab2-tab">
                        <ul class = "items-list" id = "card-list">
                            @foreach($escolas as $escola)
                                @foreach($escola->ciclos as $ciclo)
                                    @if($ciclo->nivelName == "Primeiro Ciclo")
                                    <li>
                                    <div class="card">
                                        <img src="/img/escolas/{{ $escola->image }}" alt="{{ $escola->name }}">
                                        <div class="card-body">
                                            @if($escola->private == 0)
                                            <p class="card-date"> Escola: Pública</p>
                                            @elseif($escola->private == 1)
                                            <p class="card-date"> Escola: Privada</p>
                                            @else
                                            <p class="card-date"> Escola: Comparticipada</p>
                                            @endif
                                            <h5 class="card-title"> {{$escola->name}} </h5>
                                            <a href="/escolas/{{ $escola->id }}" class="btn btn-dark">Saber mais</a>
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane fade" id ="nav-tab3" role="tabpanel" aria-labelledby ="nav-tab3-tab">
                        <ul class = "items-list" id = "card-list">
                            @foreach($escolas as $escola)
                                @foreach($escola->ciclos as $ciclo)
                                    @if($ciclo->nivelName == "Segundo Ciclo")
                                    <li>
                                    <div class="card">
                                        <img src="/img/escolas/{{ $escola->image }}" alt="{{ $escola->name }}">
                                        <div class="card-body">
                                            @if($escola->private == 0)
                                            <p class="card-date"> Escola: Pública</p>
                                            @elseif($escola->private == 1)
                                            <p class="card-date"> Escola: Privada</p>
                                            @else
                                            <p class="card-date"> Escola: Comparticipada</p>
                                            @endif
                                            <h5 class="card-title"> {{$escola->name}} </h5>
                                            <a href="/escolas/{{ $escola->id }}" class="btn btn-dark">Saber mais</a>
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane fade" id ="nav-tab4" role="tabpanel" aria-labelledby ="nav-tab4-tab">
                        <ul class = "items-list" id = "card-list">
                            @foreach($escolas as $escola)
                                @foreach($escola->ciclos as $ciclo)
                                    @if($ciclo->nivelName == "Ensino Médio")
                                    <li>
                                    <div class="card">
                                        <img src="/img/escolas/{{ $escola->image }}" alt="{{ $escola->name }}">
                                        <div class="card-body">
                                            @if($escola->private == 0)
                                            <p class="card-date"> Escola: Pública</p>
                                            @elseif($escola->private == 1)
                                            <p class="card-date"> Escola: Privada</p>
                                            @else
                                            <p class="card-date"> Escola: Comparticipada</p>
                                            @endif
                                            <h5 class="card-title"> {{$escola->name}} </h5>
                                            <a href="/escolas/{{ $escola->id }}" class="btn btn-dark">Saber mais</a>
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane fade" id ="nav-tab5" role="tabpanel" aria-labelledby ="nav-tab5-tab">
                        <ul class = "items-list" id = "card-list">
                            @foreach($escolas as $escola)
                                @foreach($escola->ciclos as $ciclo)
                                    @if($ciclo->nivelName == "Ensino Superior")
                                    <li>
                                    <div class="card">
                                        <img src="/img/escolas/{{ $escola->image }}" alt="{{ $escola->name }}">
                                        <div class="card-body">
                                            @if($escola->private == 0)
                                            <p class="card-date"> Escola: Pública</p>
                                            @elseif($escola->private == 1)
                                            <p class="card-date"> Escola: Privada</p>
                                            @else
                                            <p class="card-date"> Escola: Comparticipada</p>
                                            @endif
                                            <h5 class="card-title"> {{$escola->name}} </h5>
                                            <a href="/escolas/{{ $escola->id }}" class="btn btn-dark">Saber mais</a>
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
