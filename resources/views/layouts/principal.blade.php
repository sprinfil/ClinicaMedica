<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/componentes.css')
    @vite('resources/css/menu.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/menu.js') }}"></script>
    <title>@yield('titulo')</title>
</head>
<body class="font-Poppins flex bg-negro-fondo">

    <!--Menu-->
    @section('menu')
    @include('layouts.menu')
    @show

    <!--Main-->
    <main class="fondo bg-negro-fondo ease-out duration-100 h-screen main-cerrado" id="main" >

            <!--Boton Para desplegar el menu-->
            <div>
            <svg xmlns="http://www.w3.org/2000/svg" id="boton-toggle-menu" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 cursor-pointer active:bg-active bg-principal border border-solid border-gray-600 text-fuente-botones ease-out duration-500 p-1 h-full text-fuente-botones" onclick="togglemenu()">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            </div> 

            <!--Seccion del contenido-->
            @section('contenido')
            @show
    </main>

</body>
</html>