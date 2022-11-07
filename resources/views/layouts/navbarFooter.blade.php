<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <title>@yield('title')</title>
  
  <!--Logo no Titúlo-->
  <link rel="shortcut icon" href="img/MySchoolLogoSobre1.png" type="image/x-icon">

  <!-- Css Bootstrap-->
  <link rel="stylesheet" href="/assets/dist/css/bootstrap.min.css">
  
  <!--link para O javaScript bootstrap da pagina-->
  <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
  

  <!--Arquivo compilado style.css-->
  <link rel="stylesheet" href="/css/my_school.css">

  <!--link para O jquery da pagina-->
  <script src="/assets/dist/jquery/dist/jquery.min.js"></script>

  <!--Arquivo de css para cada pagina-->
  <link rel="stylesheet" href=@yield('cssPaginaLink')>

</head>

<body>

    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">

            <a href="/" class="navbar-brand h1 mb-0 fixed">
                <span id = "logo-titulo">
                    <img src="/img/MySchoolLogoSobre1.png" class="logo">
                </span>
                My School
            </a>

            {{--botão responsivo do collapse--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarMyschool" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMyschool">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>

                    @guest
                    <li class="nav-item"><a href="/login" class="nav-link">Entrar</a></li>
                    <li class="nav-item"><a href="/register" class="nav-link">Cadastrar</a></li>
                    @endguest

                    @auth
                    <!--codigo para o link "menu" -->
                    <li class="nav-item"><a href="/dashboard" class="nav-link">perfil</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" tabindex="-1" id="drop" data-bs-toggle="dropdown" aria-expanded="true">
                          Menu
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-darkS" aria-labelledby="drop">
                            <li><a class="dropdown-item list-group-item-dark" href="#">"#1"</a>
                            <li><a class="dropdown-item" href="#">"#2"</a></li>
                            <li><a class="dropdown-item list-group-item-dark"href="#">Comentar</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="c">
                                <a class="dropdown-item list-group-item-dark" href="#" data-bs-toggle="modal" data-bs-target="#ajuda" >
                                  Ajuda
                                </a>
                            </li>
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
    <div id="separador-nav"></div>

    <main class="container-fluid col-12">
        <div class="row">
          @if(session('msg'))
            <p class="msg"> {{session('msg')}} </p>
          @endif
        </div>
    </main>

    @yield('content')
    <div id="separador-footer"><p>.</p></div>

    <footer class = "bg-dark fixed">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div id="copy" class="col-md-7">
                    <p id ="navbar-brand-f" class = "navbar-brand">My School &copy;2021</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
