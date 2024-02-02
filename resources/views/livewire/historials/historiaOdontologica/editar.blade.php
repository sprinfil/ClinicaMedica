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
        <a href="" class="underline text-blue-500">{{ $tratamiento->fecha }}</a>
    </div>
    <div class="mx-2 md:mx-[60px] ">

        <!--Cabecera-->

        <div class=" w-full h-full bg-terciario shadow-lg rounded-md overflow-x-hidden">
            <!--Titulo -->
            <div class="justify-between mt-[20px] mx-[20px]">
                <p class="text-fuente text-[40px] mb-[20px]">{{ $tratamiento->tratamiento }}</p>
                <!--opciones-->
                <p class="text-fuente text-[20px]">Opciones</p>
                <div class="mb-[20px] flex">
              
                     
                        <button class="btn-primary mt-[10px] {{ $greenClass }}"
                            @if ($edit == true) @class(['bg-green-200']) @endif
                            wire:click="toggleEdicion">{{ $lblBoton }}</button>

                            @if($tratamiento->ticket)
                            <a href="{{ '/storage/tickets/'.$paciente->id.'/'.$tratamiento->id ."/".$tratamiento->ticket}}">
                                <div class="btn-primary items-center w-[150px] flex mt-[10px]  ml-[10px] gap-x-3">
                                    <p>Ver Ticket</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                      </svg>                          
                                </div>
                            </a>
                            @else
                                <div class="btn-primary items-center w-[150px] flex mt-[10px]  ml-[10px] gap-x-3" wire:click="generar_ticket">
                                    <p>Generar Ticket</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                      </svg>                          
                                </div>

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

                        <p class="text-fuente-botones">Atendió:</p>
                        <input wire:model="txtAtendio" type="text" class="input-pdv w-full mb-3 text-[15px]"
                            placeholder="Antedio" name="atendio" disabled>
                        @error('monto')
                            <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div>
                        <!--
                                                    <p class="text-fuente-botones">Método de pago:</p>
                        <input type="text" class="input-pdv w-full" wire:model="metodo_pago" disabled>
                        -->

                    </div>
                </div>
                <div>
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

        <!--SERVICIOS REALIZADOS-->
         <!--TABLA-->
         <div class="mt-[30px] text-[20px]">
            <p>Servicios realizados</p>
         </div>
         <div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  my-[25px] no-scrollbar min-h-[230px] w-[100%] md:w-[50%]">
                <table class="w-full text-sm text-left text-fuente dark:text-fuente">
                    <thead
                        class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Descripcion
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($detalle_tratamiento != null)

                            @foreach ($detalle_tratamiento as $detalle)
                                <tr
                                    class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400  text-center">

                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones "
                                        id="casilla">
                                        <span>
                                            {{ $detalle->servicio->nombre }}
                                        </span>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!---FIN-->
        </div>

        <!--Imagenes clinicas-->
        <div class="h-full  bg-[#E1E1E1] shadow-lg  mt-[20px]  rounded-lg mb-[30px] @if(count($imagenes_clinicas) == 0 && !$edit) hidden @endif mx-2 md:mx-[60px] ">
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
        <div class="h-full  bg-[#E1E1E1] shadow-lg  mt-[20px]  rounded-lg mb-[30px] @if(count($imagenes_radiografias) == 0 && !$edit) hidden @endif mx-2 md:mx-[60px] ">
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
