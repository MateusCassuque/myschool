<x-app-layout>
@section('title', 'My School/Curricular/'. $user->name)
@section('pagStyle', '/css/curricular.css')

<div id="capa-container" style="background-image:url('../../img/escolas/{{ Auth::user()->profile_photo_path }}')">
    <div id="image-container">
        <img class = "container-fluid"
            src="../../img/escolas/{{ Auth::user()->profile_photo_path }}"
            alt="{{ $user->name }}"/>
    </div>
</div>
<div class="col-12 container">
    <div id="status">
        <h1>{{ $user->name }}</h1>
        @if($user->userAdmin == 1)
        <p id = "p-adimin">Adiministrador de sistema</p>
        @endif
    </div>

    @if($user->userAdmin == 1)
        <div id="buttons-container">
            <a href="{{ route('criarEscola') }}" class="btn btn-primary">Adicionar Escola</a>
        </div>
    @endif
    <div id="escola-container">
       @if($user->userAdmin == 1)
       <h3>Minhas Escolas</h3>
       @else
       <h3>Minha Escola</h3>
       @endif

       <div class="row mb-5">
           @forelse($escolas as $escola)
           <div class="col-md-4">
               <div class="card">
                   <img src="/img/escolas/{{ $escola->image }}" alt="" class="card-img-top">
                   <div class="card-body">
                       <h4 class="card-title">{{$escola->name}}</h4>

                       @if($escola->private == 0)
                            <h6 class="card-subtitle mb-2 text-muted">Escola Pública</h6>
                        @elseif($escola->private == 1)
                            <h6 class="card-subtitle mb-2 text-muted">Escola Privada</h6>
                        @else
                            <h6 class="card-subtitle mb-2 text-muted"> Escola Comparticipada</h6>
                        @endif

                        <p class="card-text">
                            A escola conta com:
                            @foreach($escola->ciclos as $ciclo)
                                <strong>{{$ciclo->nivelName}}</strong>;
                            @endforeach
                        </p>
                        <a href="/escolas/{{ $escola->id }} #nav-ciclos" class="card-link btn btn-primary">Explorar</a>
                        <a href="/escolas/{{ $escola->id }}/turma/create" class="card-link btn btn-dark">Criar Turma</a>
                    </div>
                </div>
            </div>
           @empty
           <p>Nenhuma escola foi encontrada!</p>
           @endforelse
        </div>
    </div>

</div>

</x-app-layout>
