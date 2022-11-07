<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title')</title>
  <!--Logo no Titúlo-->
  <link rel="shortcut icon" href="../img/MySchoolLogoSobre1.png" type="image/x-icon">

  <!-- Css Bootstrap-->
  <link rel="stylesheet" href=@yield('bootstrapLink')>

  <!--Arquivo compilado style.css-->
  <link rel="stylesheet" href=@yield('cssLink1')>
  <link rel="stylesheet" href=@yield('cssLink2')>

  <!--Arquivo de css para cada pagina-->
  <link rel="stylesheet" href=@yield('cssPaginaLink')>

  <!--link para O javaScript bootstrap da pagina-->
  <script src=@yield('jsAppLink') ></script>
  <script src=@yield('jsPageLink') ></script>
</head>

<body>
  <!--codigo para toda aria de navegação-->
  <header>
    <nav id="navbar" class=" rounded navbar navbar-expand-md fixed-top navbar-dark  bg-dark ">
      <div class="container-fluid">
        <h1 id = "logo-titulo" class="navbar-brand">
          <img src="/img/MySchoolLogoSobre.png" class="logo">
          <span id = "navbar-brand">My School</span>
        </h1 >

        {{--botão responsivo do collapse--}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('home')}}" tabindex="-1">
                Home
              </a>
            </li>

            @guest
              <li class="nav-item"><a href="/login" class="nav-link">Entrar</a></li>
              <li class="nav-item"><a href="/register" class="nav-link">Cadastrar</a></li>
            @endguest

            @auth
            <!--codigo para o link "menu" -->
              <li class="nav-item">
                <a href="/dashboard" class="nav-link">perfil</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" tabindex="-1" id="drop" data-bs-toggle="dropdown" aria-expanded="true">
                  Menu
                </a>
                <ul class="dropdown-menu dropdown-menu-end bg-darkS" aria-labelledby="drop">
                  <li><a class="dropdown-item list-group-item-dark" href="#">"#1"</a>
                  <li><a class="dropdown-item" href="#">"#2"</a></li>
                  <li><a class="dropdown-item list-group-item-dark"href="#">Comentar</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="c"><a class="dropdown-item list-group-item-dark" href="#" data-bs-toggle="modal" data-bs-target="#ajuda" >
                  Ajuda
                  </a></li>
                </ul>
              </li>
            <li class="nav-item">
              <form action="/logout" method="post">
               @csrf
                <a href="/logout"
                  class="nav-link"
                  onclick ="event.preventDefault();
                  this.closest('form').submit();">
                  Sair
                </a>
            </form>
            </li>

          @endauth
        </ul>
        @yield('pesquisa')
      </div>
    </div>
  </nav>
  </header>
  <div id="separador-nav"></div>
  <main class="container-fluid col-12">
    <div class="row">
      @if(session('msg'))
        <p class="msg"> {{session('msg')}} </p>
      @endif
      @yield('content')
    </div>

    <!-- codigo para o "sobre a pagina" -->
    <div class="modal fade" id="ajuda" tabindex="-1" aria-labelledby="ajuda" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header" style="background-color: chocolate;">

            <h2 class="modal-title " id="ajuda"> <img src="imagens/MySchoolLogo1.png" class="logo">  <h2 style="color: #fff;"> <small> A tua escola nas mãos</small> </h2></h2>


          </div>
          <div class="modal-body" style="font-style: italic; background-color: black;">
              <h4>Objetivo da Página</h4>
            <p>Yo, shout out to all you kids, buying bottle service, with your rent money. So I sat quietly, agreed politely. They say, be afraid you're not like the others, futuristic lover. Boom, boom, boom. Don't need apologies. We can dance, until we die, you and I, will be young forever. If you choose to walk away, don’t walk away. You know that I'm the girl that you should call. This Friday night, do it all again.</p>
            <p>I'm walking on air. But lil' mama so dope. It's time to bring out the big balloons. Are you ready for, ready for. The boys break their necks try'na to creep a little sneak peek. Summer after high school when we first met. If you want it all. (This is how we do) You open my eyes and I'm ready to go, lead me into the light.</p>

            <h4>Como Utilizar a Página</h4>
            <p>
          <ul>
            <li>Don't be a shy kinda guy I'll bet it's beautiful. You fall asleep during foreplay, 'Cause the pills you take, are more your forte. Open up your heart.</li>
            <li>You're never gonna be unsatisfied. Know that you are worthy.</li>
            This one goes out to the ladies at breakfast in last night's dress. You think you've seen her in a magazine.
            <li> I should've told you what you meant to me 'Cause now I pay the price. Takes you miles high, so high, 'cause she’s got that one international smile</li>.
          </p>

        </ul>

        <P>
              <ul>
                <li><a href=""> Ajuda de especialistas </a></li>
              </ul>
            </P>
          </div>
          <div class="modal-footer" style="background-color:chocolate; ">
            <h2 ></h2>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

  </main>
  <div id="separador-footer"><p>.</p></div>

  <br>
  <footer class = "bg-dark">
    <div class="col-md-10 offset-md-1">
      <div class="row">
        <div id="copy" class="col-md-7">
          <p id ="navbar-brand-f" class = "navbar-brand">My School &copy;2021</p>
        </div>
        <div id="socialMedia" class="col-md-3">
          <p>
            <a target="blank" href="http://www.twitter.com"><ion-icon src = "/fontes/Icones/ionicons/logo-twitter.svg"></ion-icon></a>
            <a target="blank" href="http://www.facebook.com/CassuqueProEventos"><ion-icon src = "/fontes/Icones/ionicons/logo-facebook.svg"></ion-icon></a>
            <a target="blank" href="http://www.whatsapp.com"><ion-icon src = "/fontes/Icones/ionicons/logo-whatsapp.svg"></ion-icon></a>
            <a target="blank" href="http://www.instagram.com"><ion-icon src = "/fontes/Icones/ionicons/logo-instagram.svg"></ion-icon></a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://unpkg.com/ionicons@5/dist/ionicons.js"></script>
</body>
</html>
