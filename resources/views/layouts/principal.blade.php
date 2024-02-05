<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Importaciones (css y js)-->
    @section('importaciones')
        @include('layouts.importaciones')
    @show

    @livewireStyles
    <title>SurCodeMedics - @yield('titulo')</title>
    @yield('css')
</head>
<body class="font-Poppins flex overflow-auto min-h-screen">

   
        <!--Animacion de carga-->
        @section('loader')
            @include('layouts.loader')
        @show

        @if (session()->has('usuario'))

        <!--Menu-->
        @section('menu')
            @include('layouts.menu')
        @show
        @endif

    
    <!--Main-->
    <main class="flex-grow fondo bg-negro-fondo ease-out duration-100 h-screen  overflow-auto overflow-x-hidden no-scrollbar" id="main" >                

        @if (session()->has('usuario'))
            <!--Iconos de acceso rapido-->
            @section('acceso-rapido')
                @include('layouts.acceso-rapido')
            @show
        @endif
   

          
        <!--Seccion del contenido-->
        @section('contenido')
        @show
        
        <footer class=" mt-14 font-extrabold text-3xl text-right rounded-lg shadow-b shadow-md shadow-[#305f4b]">
            <div id="clock" class="clock p-2"></div>
        </footer>
            <script>
                // Función para actualizar el reloj
                function updateClock() {
                    var now = new Date(); // Obtiene la hora actual
                    var hours = now.getHours();
                    var minutes = now.getMinutes();
                    var seconds = now.getSeconds();
                
                    // Agrega ceros iniciales si los minutos o segundos son menores de 10
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    seconds = seconds < 10 ? '0' + seconds : seconds;
                
                    // Construye la cadena de tiempo y la establece como contenido del elemento 'clock'
                    var timeString = hours + ':' + minutes + ':' + seconds;
                    document.getElementById('clock').textContent = timeString;
                
                    // Llama a esta función nuevamente en 1 segundo
                    setTimeout(updateClock, 1000);
                }
                
                // Inicia la actualización del reloj
                updateClock();
            </script>
    </main>
    @livewireScripts
    @yield('js')
</body>
</html>