<x-app-layout>

@section('title', 'My School/Perfil')

    <div class="col-11 bg-white">
        <div class="row">
            <div class="col-4 col-md-3 bg-dark min-h-screen" id="nav-container">
                <h1>@yield('userType')</h1>
                <div id="barra" class=""></div>
                <nav class="navbar" id="navbar-vertical">
                    <nav class="nav nav-pills flex-md-column">
                    <ul class="navbar-nav">
                        <li class= "dropdown">
                                @yield('item1')
                        </li>
                        <li class= "dropdown">
                            @yield('item2')
                        </li>
                        <li class= "dropdown">
                            @yield('item3')
                        </li>
                        <li class= "dropdown">
                            @yield('item4')
                        </li>
                        </ul>
                    </nav>
                </nav>

                <div class="" id="logo">
                    <a href="#" class="img-fluid">
                        <img src="/img/MySchoolLogoSobre1.png" alt="Logotipo_MySchool-Preto">
                    </a>
                </div>

            </div>

            <div class="col-6 col-md-8">
                <div class="row" id="sub-cabecalho">
                    <nav class="navbar navbar-light">
                        <div class="col-4 col-md-3" id="logo">
                            <a href="#" class="img-fluid">
                                <img class="w-50" src="/img/MySchoolLogoSobre1.png" alt="Logotipo_MySchool-Preto">
                            </a>
                        </div>
                        <div class="col-4 col-md-5">
                            <h1 class="navbar-brand">Loga da Escola</h1>
                        </div>
                    </nav>
                </div>
                <div class="min-h-screen" id="">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
