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
                        <button class="btn-primary" wire:click="configuracion_citas_guardar">Guardar Cambios</button>

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
                        <button class="btn-primary" wire:click="configuracion_moneda_guardar">Guardar Cambios</button>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>
</div>
@section('js')
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
    </script>
@endsection
