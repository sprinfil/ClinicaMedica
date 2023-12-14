<div>
    @if ($paciente)
        <div class="{{ $esconder }}">

            <!--///////Div para agregar transparencia//////-->
            <div class="bg-black w-screen h-screen z-[10] absolute top-0 left-0 opacity-60"></div>

            <!--///////Div contenedor para centrar el modal//////-->
            <div class="w-screen h-screen z-[30] absolute top-0 left-0 items-center justify-center flex">

                <!--///////Contenedor del modal//////-->
                <div class="bg-fuente rounded-md overflow-auto md:w-[800px] w-full md:h-auto ">

                    <!--///////Icono del modal (contenedor superior)//////-->
                    <div class="w-full h-[50px] flex items-center justify-center">
                        <p class="text-fuente-botones text-[20px] ">Cita</p>
                    </div>
                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center {{ $esconder_error }}">
                        El horario para esta cita esta ocupado </div>
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
                                <input name="paciente" type="input" class="input-pdv w-full"
                                placeholder="paciente" wire:model="paciente" disabled>
                                <a href="tel:{{ $cita->pacientee->numero }}" >
                                    <div class="bg-fuente shadow-md flex items-center justify-center py-2 px-1 cursor-pointer hover:bg-[#ADB0B5] transition ease-in-out delay-50 rounded-md mt-[10px]">
                                        {{ $cita->pacientee->numero }}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9  text-green-600 bg-principal rounded-md p-1 h-9 ml-5 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                          </svg>
                                    </div>
                                </a>
                                @error('paciente')
                                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }} </div>
                                @enderror

                                <p class="mt-[10px]">Tratamiento</p>
                                <input name="tratamiento" type="input" class="input-pdv w-full"
                                    placeholder="Tratamiento" wire:model="tratamiento" disabled>
                                @error('tratamiento')
                                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }} </div>
                                @enderror
                            </div>
                            <!--Segunda columna-->
                            <div>
                                <p>Hora fin</p>
                                <input name="hora_fin" type="input" class="input-pdv w-full"
                                placeholder="hora fin" wire:model="hora_fin" disabled>

                                <p class="mt-[10px]">Atiende</p>
                                <input name="atiende" type="input" class="input-pdv w-full"
                                placeholder="atiende" wire:model="atiende" disabled>
                                @error('atiende')
                                    <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }} </div>
                                @enderror

                            </div>
                        </div>


                        <!--///////Botones (contenedor inferior)//////-->
                        <div class="bg-fuente w-full h-[80px] flex justify-end py-3">

                            <p class="btn-primary-red right-0 mr-2  items-center flex cursor-pointer text-fuente"
                                wire:click="salir">Volver</p>
                            <p class="btn-primary-red right-0 mr-2  items-center flex cursor-pointer text-fuente"
                            wire:click="cancelar_cita">Cancelar / Finalizar Cita</p>
                            <p class="btn-primary right-0 mr-2  items-center flex cursor-pointer "
                            wire:click="confirmar_cita">@if($cita->confirmada) Confirmada @else Confirmar @endif</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    @endif


</div>
