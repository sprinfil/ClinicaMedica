<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('pacientes') }}" class="underline text-blue-500">Pacientes</a>
        /
        <a href="{{ route('expediente', ['paciente_id' => $paciente->id]) }}"
            class="underline text-blue-500">{{ $paciente->getFullNombre($paciente->id) }}</a>
        /
        <a href="{{ route('historia_odontologica', ['paciente_id' => $paciente->id]) }}" class="underline text-blue-500">Tratamientos</a>
        /
        <a href="" class="underline text-blue-500">{{ $tratamiento->tratamiento }}</a>
    </div>
    <div class="mx-2 md:mx-[60px] ">

        <!--Cabecera-->
        <div class=" w-full h-full bg-terciario shadow-lg rounded-md overflow-x-hidden">
            <!--Titulo -->
            <div class="justify-between mt-[20px] mx-[20px]">
                <p class="text-fuente text-[40px] mb-[20px]">{{ $tratamiento->tratamiento }}</p>
                <!--opciones-->
                <div class="mb-[20px]">
                    @if (session()->has('usuario') && session('usuario')->Tipo === 'Admin')
                        <p class="text-fuente text-[20px]">Opciones</p>
                        <button class="btn-primary mt-[10px] {{ $greenClass }}"
                            @if ($edit == true) @class(['bg-green-200']) @endif
                            wire:click="toggleEdicion">{{ $lblBoton }}</button>
                        <button class="btn-primary-red mt-[10px]  "
                            wire:click = "TratamientoEliminar">Eliminar</button>
                    @endif
                </div>
            </div>
        </div>

        <!--Datos del tratamiento-->
        <div class="h-full bg-[#E1E1E1] shadow-lg pb-[40px] mt-[20px] rounded-lg">
            <form action="{{ route('historia_odontologica_store', ['paciente_id' => $paciente->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="w-full bg-negro-menu text-center py-2 rounded-t-lg">
                  <p class="text-fuente text-[20px]">Detalles del tratamiento</p>
                </div>
                <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2 ">
                    <div>
                        <p class="text-fuente-botones">Fecha:</p>
                        <input wire:model="dtFecha" type="datetime-local" class="input-pdv w-full mb-3 text-[15px]"
                            name="fecha" @if ($edit == false) disabled @endif>
                        @error('fecha')
                            <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                            </div>
                        @enderror

                        <p class="text-fuente-botones">Tratamiento:</p>
                        <input wire:model="txtTratamiento" type="text" class="input-pdv w-full mb-3 text-[15px]"
                            placeholder="Tratamiento" name="tratamiento"
                            @if ($edit == false) disabled @endif>
                        @error('tratamiento')
                            <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                            </div>
                        @enderror

                        <p class="text-fuente-botones">Atendió:</p>
                        <input wire:model="txtAtendio" type="text" class="input-pdv w-full mb-3 text-[15px]"
                            placeholder="Antedio" name="atendio" disabled>
                        @error('monto')
                            <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div>

                        <p class="text-fuente-botones">Método de pago:</p>
                        <select wire:model="txtMetodoPago" name="metodo_pago" class="input-pdv w-full mb-3 text-[15px]"
                            @if ($edit == false) disabled @endif>
                            <option value="Tarjeta" @if ($txtMetodoPago == 'Tarjeta') selected @endif>Tarjeta</option>
                            <option value="Efectivo" @if ($txtMetodoPago == 'Efectivo') selected @endif>Efectivo</option>
                        </select>
                        @error('metodo_pago')
                            <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                            </div>
                        @enderror

                        <p class="text-fuente-botones">Monto:</p>
                        <input wire:model="txtMonto" type="text" class="input-pdv w-full mb-3 text-[15px]"
                            placeholder="monto" name="monto" value="{{ $monto }}"
                            @if ($edit == false) disabled @endif>
                        @error('monto')
                            <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>

                <div class="mx-[30px]">
                    <p class="text-fuente-botones">Notas:</p>
                    <textarea wire:model="txtNotas" name="nota" id="" rows="6" class="input-pdv w-full mb-3"
                        @if ($edit == false) disabled @endif>{{ $nota }}</textarea>
                    @error('nota')
                        <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                </div>
            </form>
        </div>

        <!--Imagenes clinicas-->
        <div class="h-full  bg-[#E1E1E1] shadow-lg  mt-[20px]  rounded-lg mb-[30px]">
          <div class="w-full bg-negro-menu text-center py-2 rounded-t-lg">
            <p class="text-fuente text-[20px]">Imagenes Clinicas</p>
          </div>

            <div @if ($edit == false) @class(['hidden']) @endif>
                <form
                    action="{{ route('historia_odontologica_clinica_subir', ['tratamiento_id' => $tratamiento->id, 'paciente_id' => $paciente->id]) }}"
                    class="dropzone mx-[19px] mt-[20px] mb-[30px] bg-fuente rounded-md" id="my-awesome-dropzone">
                </form>
            </div>

            <div class="flex overflow-x-auto">

                @foreach ($imagenes as $imagen)
                    @if ($imagen->tipo == 'clinica' && $imagen->eliminar == null)
                        <div class="mx-4 my-4 w-[200px]">
                            <a href="{{ $imagen->url }}" data-lightbox="clinica">
                                <img src="{{ $imagen->url }}" alt="" class="h-100px min-w-[200px] rounded-md">
                            </a>
                            @if ($edit == true)
                                <div class="w-full justify-center flex mt-[10px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-9 h-9 text-rojo cursor-pointer active:text-fuente ease-out duration-200"
                                        wire:click="advertencia({{ $imagen->id }})">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            @endif

                        </div>
                    @endif
                @endforeach
            </div>

        </div>


        <!--Radiografias-->
        <div class="h-full  bg-[#E1E1E1] shadow-lg  mt-[20px]  rounded-lg mb-[30px]">
          <div class="w-full bg-negro-menu text-center py-2 rounded-t-lg">
            <p class="text-fuente text-[20px]">Radiografias</p>
          </div>

            <div @if ($edit == false) @class(['hidden']) @endif>
                <form
                    action="{{ route('historia_odontologica_radiografia_subir', ['tratamiento_id' => $tratamiento->id, 'paciente_id' => $paciente->id]) }}"
                    class="dropzone mx-[19px] mt-[20px] mb-[30px] bg-fuente rounded-md" id="my-awesome-dropzone">
                </form>
            </div>

            <div class="flex overflow-x-auto">

                @foreach ($imagenes as $imagen)
                    @if ($imagen->tipo == 'radiografia' && $imagen->eliminar == null)
                        <div class="mx-4 my-4 w-[200px]">
                            <a href="{{ $imagen->url }}" data-lightbox="radiografia">
                                <img src="{{ $imagen->url }}" alt=""
                                    class="h-100px min-w-[200px] rounded-md">
                            </a>
                            @if ($edit == true)
                                <div class="w-full justify-center flex mt-[10px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-9 h-9 text-rojo cursor-pointer active:text-fuente ease-out duration-200"
                                        wire:click="advertencia({{ $imagen->id }})">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            @endif

                        </div>
                    @endif
                @endforeach
            </div>

        </div>

    </div>
</div>



</div>
