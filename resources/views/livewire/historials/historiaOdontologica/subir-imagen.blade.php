<div>
    <div>
        <!--navegacion superior-->
        <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
            <a href="{{ route('pacientes') }}" class="underline text-blue-500">Pacientes</a>
            /
            <a href="{{ route('expediente', ['paciente_id' => $paciente->id]) }}"
                class="underline text-blue-500">{{ $paciente->getFullNombre($paciente->id) }}</a>
            /
            <a href="{{ route('historia_odontologica', ['paciente_id' => $paciente->id]) }}"
                class="underline text-blue-500">Tratamientos</a>
            /
            <a href="" class="underline text-blue-500">Nuevo Tratamiento</a>
        </div>

        <div class="mx-2 md:mx-[60px] ">
            <!--Cabecera-->
            <div
                class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
                <div class="mx-[10px] md:mx-[50px]  justify-between">
                    <p class="text-fuente text-[40px]">Nuevo Tratamiento</p>
                    <p class="text-fuente text-[25px]"> {{ $paciente->getFullNombre($paciente->id) }}</p>
                </div>
            </div>

            <div class="h-full py-4 bg-principal shadow-lg pb-[40px] mt-[20px] rounded-lg">

                <p class="text-fuente-botones ml-[30px] mb-[30px]">Agregar Imagen (Odontológica)</p>


                <form
                    action="{{ route('historia_odontologica_clinica_subir', ['tratamiento_id' => $tratamiento->id, 'paciente_id' => $paciente->id]) }}"
                    class="dropzone mx-[30px] rounded-md" id="my-awesome-dropzone">
                </form>

                <p class="text-fuente-botones ml-[30px] mb-[30px] mt-[30px]">Agregar Imagen (Radiografía)</p>


                <form
                    action="{{ route('historia_odontologica_radiografia_subir', ['tratamiento_id' => $tratamiento->id, 'paciente_id' => $paciente->id]) }}"
                    class="dropzone mx-[30px] rounded-md" id="my-awesome-dropzone">
                </form>
                    <div class="btn-primary mt-[20px] ml-[30px] w-[150px] flex bg-amber-300 hover:bg-amber-200" wire:click="descargar_ticket">
                        <p>Descargar Ticket</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                          </svg>                          
                    </div>
                    
                <a href="{{ route('historia_odontologica', ['paciente_id' => $paciente->id]) }}">
                    <button class="btn-primary mt-[20px] ml-[30px]  w-[150px]">Aceptar</button>
                </a>

            </div>

        </div>
    </div>
</div>
