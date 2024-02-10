<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('configuracion') }}" class="underline text-blue-500">configuracion</a>
    </div>

    <div class="mx-2 md:mx-[60px] mt-[20px] overflow-auto mb-[100px] no-scrollbar">
        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">AJUSTES</p>
            </div>
        </div>

        <!--Ajustes de citas-->
        <div class="h-full bg-[#E1E1E1] shadow-lg mt-[20px] rounded-lg ease-out duration-300 overflow-hidden">
            <div class="w-full bg-negro-menu text-center py-2">
                <p class="text-fuente text-[25px]">CITAS</p>
            </div>
            <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2 ">
                <div>
                    <p class="text-fuente-botones">Horario inicial:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" type="time" wire:model = "horario_inicio">

                </div>
                <div>
                    <p class="text-fuente-botones">Horario Final:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" type="time" wire:model = "horario_final">
                    <div class="flex justify-end">
                        <button class="btn-primary" wire:click="configuracion_citas_guardar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#2E86C1" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"/>
                    <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"/>
                  </svg></button>

                    </div>
                </div>
            </div>

        </div>

        <!--Ajustes de moneda-->
        <div class="h-full bg-[#E1E1E1] shadow-lg mt-[20px] rounded-lg ease-out duration-300 overflow-hidden">
            <div class="w-full bg-negro-menu text-center py-2">
                <p class="text-fuente text-[25px]">MONEDAS</p>
            </div>
            <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2 ">
                <div>
                    <p class="text-fuente-botones">Valor del Dolar:</p>
                    <div class="flex gap-x-2 items-center">
                        <p>$</p>
                        <input class="input-pdv w-full mb-3 text-[15px]" type="number" wire:model = "dolar">
                    </div>

                </div>
                <div>
                    <p class="text-fuente-botones">Porcentaje de impuesto:</p>
                    <div class="flex justify-center gap-x-2">
                        <div class=" flex items-center">
                            <p class="text-[16px] ">%</p>
                        </div>
                        <input class="input-pdv w-full mb-3 text-[15px]" type="number" wire:model = "impuesto">

                    </div>
                    <div class=" flex justify-end">
                        <button class="btn-primary" wire:click="configuracion_moneda_guardar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#2E86C1" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"/>
                    <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"/>
                  </svg></button>
                    </div>

                </div>
            </div>


        </div>
        
            <!--Ajustes logo-->
            <div>
                <div class="h-full bg-[#E1E1E1] shadow-lg mt-[20px] rounded-lg ease-out duration-300 overflow-hidden">
                    <div class="w-full bg-negro-menu text-center py-2">
                        <p class="text-fuente text-[25px]">INFORMACION DE LA EMPRESA</p>
                    </div>
                    <div class="ml-[59px] mt-[30px] flex gap-x-4 flex-wrap">
                        <div>
                            <p>Nombre de la Empresa</p>
                            <input type="text" class="input-pdv" wire:model="empresa_nombre">
                        </div>
                        <div class="flex items-end">
                            <button class="btn-primary mt-[10px]  h-[40px]" wire:click="aplicar_nombre_empresa">Aplicar</button>
                        </div>
                    </div>

                    <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2">
                        <form
                        action="{{ route('subir_logo') }}"
                        class="dropzone mx-[30px] rounded-md flex items-center justify-center" id="my-awesome-dropzone">
                    </form>
                    <div class="flex flex-col items-center justify-center">
                        <img src="storage/images/logo.png" alt="" class="w-[200px]">
                        <p class="mt-[20px]">Para aplicar los cambios pulse CTRL + F5</p>
                    </div>
                </div>
    
                </div>
            </div>

            <!--Ajustes de Firma-->
            <div class="h-full bg-[#E1E1E1] shadow-lg mt-[20px] mb-2 rounded-lg ease-out duration-300 overflow-hidden">
                <div class="w-full bg-negro-menu text-center py-2">
                    <p class="text-fuente text-[25px]">FIRMA RESPONSABLE</p>
                </div>
                <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2 bg-[#E1E1E1]">
                    <div>
                        <p class="text-fuente-botones">Firma Actual:</p>
                        <img src="storage/firmas/firma.png" alt="" class="w-[full] mt-5 bg-blue" id="imagen">
                    </div>
                    <div>
                        <p class="text-fuente-botones">Firma Nueva:</p>
                        <canvas id="signaturePad" class="border border-1 border-black w-[300px] h-[200px]"></canvas>
                        <br>
                        <div class="md:flex md:flex-grap gap-2">
                            <button type="button" id="saveSig" class="btn-primary font-bold">Firmar y guardar</button>
                            <button type="button" id="clearSig" class="btn-primary font-bold">Limpiar</button>
                        </div>
                        <p class="mt-[20px]">Para aplicar los cambios pulse CTRL + F5</p>
                    </div>
                </div>
    
            </div>
        <!--FIN-->
    </div>


</div>
</div>
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('horario_succes', event => {
            Swal.fire({
                position: 'center-middle',
                icon: 'success',
                title: 'Cambios de citas aplicados',
                showConfirmButton: false,
                timer: 1500,
            });
        });

        window.addEventListener('moneda_succes', event => {
            Swal.fire({
                position: 'center-middle',
                icon: 'success',
                title: 'Cambios de moneda aplicados',
                showConfirmButton: false,
                timer: 1500,
            });
        });

        window.addEventListener('fechas_incorrectas', event => {
            Swal.fire({
                position: 'center-middle',
                icon: 'warning',
                title: 'Verifica el horario',
                showConfirmButton: false,
                timer: 1500,
            });
        });

        window.addEventListener('nombre_empresa_succes', event => {
            Swal.fire({
                position: 'center-middle',
                icon: 'success',
                title: 'Nombre cambiado con exito',
                showConfirmButton: false,
                timer: 1500,
            });
        });
    </script>

<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script>
    Dropzone.options.myAwesomeDropzone = {
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
    }
</script>

<script>
    var signaturePad = new SignaturePad(document.getElementById('signaturePad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)', // Transparent background
        penColor: 'rgb(0, 0, 0)'
    });

    document.getElementById('clearSig').addEventListener('click', function (e) {
        e.preventDefault(); // Previene el comportamiento por defecto del formulario

        signaturePad.clear();
        return ;
    });

    document.getElementById('saveSig').addEventListener('click', function (e) {
        e.preventDefault(); // Previene el comportamiento por defecto del formulario

        if (signaturePad.isEmpty()) {
            Swal.fire({
                icon: "error",
                title: "Firma Necesaria",
                text: "Es necesaria haber introducido una firma",
            });
            return ;
        }

        var dataURL = signaturePad.toDataURL();

        @this.set('signatureImage', dataURL);
        @this.call('saveFirma');
    });

    window.addEventListener('firma_success', event => {
        reloadImagen();
    });

    function reloadImagen() {
        var imagen = document.getElementById('imagen');
        var fecha = new Date().getTime(); // Obtén el tiempo actual en milisegundos
        var nuevaSrc = `storage/firmas/firma.png?${fecha}`; // Añade el tiempo actual como parámetro GET
        imagen.src = nuevaSrc; // Actualiza la src de la imagen        

            Swal.fire({
                icon: "success",
                title: "Firma Guardada",
                text: "Firma para documentos guardada con exito",
            });
    }
</script>
@endsection
