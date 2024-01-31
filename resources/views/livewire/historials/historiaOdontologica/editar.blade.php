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
                        <input type="text" class="input-pdv w-full" wire:model="metodo_pago" disabled>
                        @error('metodo_pago')
                            <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                            </div>
                        @enderror

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

         <!--TRATAMIENTOS REALIZADOS-->
                 <!--CONTENEDOR-->
                 <div class="md:grid grid-cols-2 gap-10 px-7 py-7">
                    <!--TABLA-->
                    <div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  my-[25px] no-scrollbar min-h-[230px]">
                            <table class="w-full text-sm text-left text-fuente dark:text-fuente">
                                <thead
                                    class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente text-center">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Descripcion
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Cantidad
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio Unitario
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Total
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
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                                    id="casilla">
                                                    <span>
                                                        {{ $detalle->cantidad  }}
                                                    </span>
                                                </td>
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones "
                                                    id="casilla">
                                                    <span>
                                                        {{ number_format( $detalle->servicio->precio , 2)}}
                                                    </span>
                                                </td>
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones "
                                                    id="casilla">
                                                    <span>
                                                        {{number_format(($detalle->servicio->precio * $detalle->cantidad), 2)}}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--METODO PAGO-->
                    <div class="">
                        <div class="mt-[10px] flex-col items-end flex w-[400px]">
                            @if($metodo_pago == "DOLAR")
                            <p class="text-[25px]">TOTAL BRUTO USD   $ {{ number_format($total , 2)}}</p>
                            <p class="text-[25px]">I.V.A $ {{ $impuesto }}</p>
                            <p class="text-[25px] font-bold">TOTAL NETO USD $ {{ number_format(  $total_impuesto, 2)}}</p>

                            <p class="text-[25px] mt-[20px]" >CAMBIO USD $  {{ number_format( $cambio, 2)}}</p>
                            <p class="text-[25px]" >CAMBIO MXN $  {{ number_format( $cambio_mxn, 2)}}</p>
                            @else
                                <p class="text-[25px]">TOTAL BRUTO MXN $ {{ $total }}</p>
                                <p class="text-[25px]">I.V.A $ {{ $impuesto }}</p>
                                <p class="text-[25px] font-bold">TOTAL NETO MXN $ {{ number_format(  $total_impuesto, 2)}}</p>
                                @if($metodo_pago == "EFECTIVO")
                                <p class="text-[25px] mt-[20px]" >CAMBIO MXN $  {{ $cambio }}</p>
                                @endif
                            @endif
                        </div>
                        <div class="w-[400px]">
    
                            @if($metodo_pago == "EFECTIVO")
                            <p class="text-[20px] mt-[20px]">Pago con...</p>
                            <div class="mt-[10px]">
                                <input type="number" class="input-pdv w-full" placeholder="MXN" wire:model="pago_con_mxn" wire:input="actualizar_cambio" disabled>
                            </div>
                            @endif
    
                            @if($metodo_pago == "TARJETA DEBITO")
                            <p class="text-[20px] mt-[20px]">REFERENCIA</p>
                            <div class="mt-[10px]">
                                <input type="number" class="input-pdv w-full" placeholder="REFERENCIA" wire:model="referencia_pago_tarjeta_debito" disabled>
                            </div>
                            @endif
    
                            @if($metodo_pago == "DOLAR")
                            <p class="text-[20px] mt-[20px]">Pago con...</p>
                            <div class="mt-[10px]">
                                <input type="text" class="input-pdv w-full" placeholder="USD" wire:model="pago_con_usd" wire:input="actualizar_cambio" disabled>
                            </div>
                            @endif
    
                            
                            @if($metodo_pago == "TARJETA CREDITO")
                            <p class="text-[20px] mt-[20px]">REFERENCIA</p>
                            <div class="mt-[10px]">
                                <input type="number" class="input-pdv w-full" placeholder="REFERENCIA" wire:model="referencia_pago_tarjeta_credito" disabled>
                            </div>
                            @endif
                        </div>
                       
                    </div>
                    <!--FIN TRATAMINETOS-->
                </div>

        <!--Imagenes clinicas-->
        <div class="h-full  bg-[#E1E1E1] shadow-lg  mt-[20px]  rounded-lg mb-[30px] @if(count($imagenes_clinicas) == 0 && !$edit) hidden @endif">
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
        <div class="h-full  bg-[#E1E1E1] shadow-lg  mt-[20px]  rounded-lg mb-[30px] @if(count($imagenes_radiografias) == 0 && !$edit) hidden @endif">
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
