<div>
    @if ($pacientes)
        <div class="{{ $esconder }}">

            <!--///////Div para agregar transparencia//////-->
            <div class="bg-black w-screen h-screen z-[10] absolute top-0 left-0 opacity-60"></div>

            <!--///////Div contenedor para centrar el modal//////-->
            <div class="w-screen h-screen z-[30] absolute top-0 left-0 items-center justify-center flex">

                <!--///////Contenedor del modal//////-->
                <div class="bg-fuente rounded-md overflow-auto md:w-[800px] w-full md:h-auto ">

                    <!--///////Icono del modal (contenedor superior)//////-->
                    <div class="w-full h-[50px] flex items-center justify-center">
                        <p class="text-fuente-botones text-[20px] ">Agendar nueva cita</p>
                    </div>
                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center {{ $esconder_error }}">
                        El horario para esta cita esta ocupado o excede el horario laboral </div>
                    <form wire:submit="save">
                        <!--///////Contenedor del formulario (contenedor main)//////-->
                        @csrf
                        <p class="text-fuente-botones text-[15px] ml-[15px] ">{{ $nombreDia }} {{ $dia }} de
                            {{ $mes }} del {{ $year }}</p>
                          
                        <div class="h-auto justify-center grid grid-cols-2 px-4 gap-x-4 py-2">
                            <!--Primera columna-->
                            <div>
                                <p>Hora</p>
                                <input name="hora_inicio" type="input" class="input-pdv w-full"
                                    placeholder="hora inicial" wire:model="hora_inicio" disabled>
                                @error('hora_inicio')
                                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }} </div>
                                @enderror

                                <p class="mt-[10px]">Paciente</p>
                                <!--Input de busqueda-->
                                <div class="relative mt-[1px] mb-[10px] w-full">
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-full">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input wire:model="filtroNombre" wire:input="actualizarFiltroNombre"
                                        name="filtroNombre" type="text" class="input-pdv pl-10 w-full"
                                        placeholder="Buscar...">
                                </div>
                                    <select name="paciente" wire:model="selected_paciente" wire:input
                                    ="actualizar_paciente_seleccionado" id=""
                                    class="input-pdv w-full">
                                    @foreach ($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}">
                                            {{ $paciente->getFullNombre($paciente->id) }}</option>
                                    @endforeach
                                </select>
                                @error('selected_paciente')
                                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }} </div>
                                @enderror

                                <p class="mt-[10px]">Tratamiento</p>
                                <input name="tratamiento" type="input" class="input-pdv w-full"
                                    placeholder="Tratamiento" wire:model="tratamiento">
                                @error('tratamiento')
                                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }} </div>
                                @enderror
                            </div>
                            <!--Segunda columna-->
                            <div>
                                <p>Duración de la cita</p>
                                <select name="duracion" id="" class="input-pdv w-full" wire:model="duracion_cita">
                                    <option value="15">15 min</option>
                                    <option value="30">30 min</option>
                                    <option value="45">45 min</option>
                                    <option value="60" selected>1 hr</option>
                                    <option value="120">2 hr</option>
                                    <option value="180">3 hr</option>
                                    <option value="240">4 hr</option>
                                </select>

                                <p class="mt-[10px]">Atiende</p>
                                <!--Input de busqueda-->
                                <div class="relative mt-[1px] mb-[10px] w-full">
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-full">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input wire:model="filtroNombreUsuario" wire:input="actualizarFiltroNombreUsuario"
                                        name="filtroNombre" type="text" class="input-pdv pl-10 w-full"
                                        placeholder="Buscar...">
                                </div>
                                <select name="atiende" wire:model="selected_atiende" id=""
                                    class="input-pdv w-full">
                                    @foreach ($medicos as $medico)
                                        <option value="{{ $medico->id }}">
                                            {{ $medico->getNombreCompleto() }}</option>
                                    @endforeach
                                </select>
                                @error('selected_paciente')
                                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }} </div>
                                @enderror

                            </div>
                        </div>


                        <!--///////Botones (contenedor inferior)//////-->
                        <div class="bg-fuente w-full h-[80px] flex justify-end py-3">
                            <p class="btn-primary right-0 mr-5 bg-rojo items-center flex cursor-pointer"
                                wire:click="salir">Cancelar</p>
                            <button class="btn-primary right-0 mr-5" type="submit"> Aceptar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    @endif


</div>
