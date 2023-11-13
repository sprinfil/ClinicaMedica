<div>
  <!--navegacion superior-->
  <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
    <a href="{{route('historial_medico')}}" class="underline text-blue-500">Expedientes</a> 
    </div>


  <div class="mx-2 md:mx-[60px] mt-[20px]">
    <div>
       <!--Cabecera-->
    <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
      <div class="mx-[10px] md:mx-[50px]  justify-between">
        <p class="text-fuente text-[40px] mb-[20px]">EXPEDIENTES</p>
      </div>
    </div>

        <div class="md:flex justify-between block">
          @csrf
                      <!--Input de busqueda-->
      <div class="relative mt-[40px]">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input wire:model="filtroNombre" wire:input="actualizarFiltroNombre" name="filtroNombre" type="text" class="input-pdv pl-10" placeholder="Buscar...">
      </div>

              
        </div>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-[25px]">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                          EXPEDIENTES
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($pacientes as $paciente)
                <tr class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400 hover:bg-gray-50 dark:hover:bg-gray-400" wire:click="expediente({{ $paciente->id }})">
                      <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones" id="casilla">
                        <div class="flex items-center gap-x-3">
                          <div>
                            <span >{{$paciente->getFullNombre($paciente->id)}}</span>
                          </div>
                          <div class="w-full flex justify-end items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-fuente-botones ml-[10px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                          </div>
                        </div>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
            {{ $pacientes->links()}}
        </div>
      </div>
</div>
</div>

