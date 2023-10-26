<div>
    <div class=" w-full h-full py-4 bg-terciario shadow-lg pb-[40px]">
        <div class="mx-[10px] md:mx-[50px] mt-[2px] text-fuente text-[20px]">
            <a href="{{route('historial_medico')}}" class="underline text-blue-500">Expedientes</a> 
            / 
            <a href="" class="underline text-blue-500">{{$paciente->nombre}}</a>
          </div>
    
        <div class="mx-[10px] md:mx-[50px] mt-[10px]">
            <p class="text-fuente text-[40px]">HISTORIAL ODONTOLÓGICO</p>
            <button class="btn-primary mt-[10px]" wire:click="historia_odontologica_create({{$paciente->id}})">Agregar +</button>
            <button class="btn-primary mt-[10px]" wire:click="toggleVerInfo">Ver información del paciente</button>
        </div>
    </div>
            <!--Datos del paciente-->
    <div class="h-full {{$esconder}} py-4 bg-terciario shadow-lg mt-[20px] mx-[20px] rounded-lg ease-out duration-300 overflow-hidden">
          <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2 ">
              <div>
                <p class="text-fuente text-[20px] mb-[20px]">Información del paciente</p>
                  <p class="text-fuente">Nombre:</p>
                  <input class="input-pdv w-full mb-3 text-[20px]" value="{{$paciente->getFullNombre($paciente->id)}}" disabled>
                  <p class="text-fuente">Correo:</p>
                  <input class="input-pdv w-full mb-3 text-[20px]" value="{{$paciente->correo}}" disabled>
                  <p class="text-fuente">Número:</p>
                  <input class="input-pdv w-full mb-3 text-[20px]" value="{{$paciente->numero}}" disabled>
                  <p class="text-fuente">Edad:</p>
                  <input class="input-pdv w-full mb-3 text-[20px]" value="{{$edad}}" disabled>
                  <p class="text-fuente">Genero:</p>
                  <input class="input-pdv w-full mb-3 text-[20px]" value="{{$paciente->Genero}}" disabled>
              </div>
              <div>
                <p class="text-fuente text-[20px] mb-[20px]">Contacto de emergencia</p>
                <p class="text-fuente">Nombre:</p>
                <input class="input-pdv w-full mb-3 text-[20px]" value="{{$paciente->contacto_nombre}}" disabled>
                <p class="text-fuente">Número:</p>
                <input class="input-pdv w-full mb-3 text-[20px]" value="{{$paciente->contacto_numero}}" disabled>
                <p class="text-fuente">Correo:</p>
                <input class="input-pdv w-full mb-3 text-[20px]" value="{{$paciente->contacto_correo}}" disabled>
                <p class="text-fuente">Parentesco:</p>
                <input class="input-pdv w-full mb-3 text-[20px]" value="{{$paciente->contacto_parentesco}}" disabled>
              </div>
        </div> 

      </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg md:mx-[50px] my-[25px]">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                        Tratamiento
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Atendió
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Monto
                    </th>
                    <th scope="col" class="px-6 py-3" >
                        Metodo de pago
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($tratamientos as $tratamiento)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" wire:click="editar({{$tratamiento->id}})">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                            <span>{{$tratamiento->tratamiento}}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                            <span >{{\Carbon\Carbon::parse($tratamiento->fecha)->format('d/m/Y h:i A')}}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                            <span >{{$tratamiento->atendio->nombre}}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                            <span >$ {{$tratamiento->monto}}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                            <span >{{$tratamiento->metodo_pago}}</span>
                        </td>
                    </tr>
             @endforeach
            </tbody>
        </table>
        <div class="px-[10px] py-[10px] bg-gray-700">
            {{ $tratamientos->links()}}
        </div>
    </div>
