    <footer class=" mt-14 font-extrabold text-3xl text-right rounded-lg shadow-b shadow-md fixed bottom-0 right-0">
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
