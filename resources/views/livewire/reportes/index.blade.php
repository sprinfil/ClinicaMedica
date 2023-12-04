<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('reportes') }}" class="underline text-blue-500">reportes</a>
    </div>

    <!--Div principal-->
    <div class="mx-2 md:mx-[60px] mt-[20px] overflow-auto mb-[100px] no-scrollbar">
        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">REPORTES</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-[20px]">

            <!--Primera Columna-->
            <div class="bg-principal px-4 py-4 rounded-md shadow-md">
                <p class="text-[20px] ml-[9px]">PERIODO</p>

                <div class="px-1 py-1">
                    <p>del</p>
                    <input type="date" name="" id="inputDate" class="input-pdv w-full" wire:model="FechaPickerInicial"
                        wire:change="actualizarFecha">
                </div>

                <div class="px-1 py-1">
                    <p>al</p>
                    <input type="date" name="" id="inputDate" class="input-pdv w-full" wire:model="FechaPickerFinal"
                        wire:change="actualizarFecha">
                </div>


            </div>
            <!--Segunda Columna-->
            <div>

            </div>
        </div>
    </div>
</div>
