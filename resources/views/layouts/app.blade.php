<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Styles do Jetstream -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts do Jetstream -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        @livewireStyles

        <!--Logo no Titúlo-->
        <link rel="shortcut icon" href="/img/MySchoolLogoSobre1.png" type="image/x-icon">

        <!-- Css Bootstrap-->
        <link rel="stylesheet" href="/assets/dist/css/bootstrap.min.css">

        <!--link para O javaScript bootstrap da pagina-->
        <script src= "/assets/dist/js/bootstrap.bundle.min.js" ></script>

        <!--Arquivo de css para cada pagina-->
        <link rel="stylesheet" href="/css/my_school.css">
        <link rel="stylesheet" href="/css/appStyle.css">
        <link rel="stylesheet" href=@yield('pagStyle') >

        <!--Link do Js-->
        <script language="javascript" src="/js/showFuncoes.js"></script>
        
        <!--link para O jquery da pagina-->
        <script src="/assets/dist/jquery/dist/jquery.min.js"></script>


    </head>
    <body>
        <div>
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header}}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <div class="flex justify-center mt-4 sm:items-center sm:justify-between col-9">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                        <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>

                    <a href="#" class="ml-1 underline">
                        My School
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                &copy;CTA 2021
            </div>
        </div>
    </body>
</html>
