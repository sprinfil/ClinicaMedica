    <footer class=" mt-14 text-3xl text-right shadow-b shadow-md fixed bottom-0 right-0 bg-negro-menu w-full text-fuente text-[12px] md:text-[17px] h-[30px] flex justify-end items-center">
        <p class="mr-2 text-[12px]">SC <span>&copy; {{ now()->year }} </span></p>
        <p class="mr-[15px]"> {{ Carbon\Carbon::now()->dayName }} {{ Carbon\Carbon::now()->format('d') }} de {{ Carbon\Carbon::now()->monthName }} del {{ Carbon\Carbon::now()->format('Y') }}</p>
        <div id="clock" class="clock p-2">   </div>
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
