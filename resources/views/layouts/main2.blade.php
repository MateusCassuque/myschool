<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>
        <!--Logo no Titúlo-->
        <link rel="shortcut icon" href="/img/MySchoolLogoSobre1.png" type="image/x-icon">

        <!-- Css Bootstrap-->
        <link rel="stylesheet" href=@yield('bootstrapLink')>

        <!--Arquivo compilado style.css-->
        <link rel="stylesheet" href=@yield('cssLink')>

         <!--Arquivo de css para cada pagina-->
         <link rel="stylesheet" href=@yield('cssPaginaLink')>



    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">

                    <div class="col-md-6">
                        <div id="logoImg" class="row">
                            <div class="col-md-2" >
                                <img src="/img/MySchoolLogoSobre1.png" alt="">
                            </div>
                            <div class="col-md-4">
                                <h2 class="nav-brand">
                                    My School
                                </h2>
                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Escolas</a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">perfil</a>
                            </li>

                            <li class="nav-item">
                                <a href="/escolas/create" class="nav-link">Criar Escola</a>
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
                        @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">Cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg"> {{session('msg')}} </p>
                @endif
                @yield('content')
            </div>
        </main>
        <br>
        <footer>
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div id="copy" class="col-md-7">
                        <p>My School &copy;2021</p>
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
