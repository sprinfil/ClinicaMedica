<div>
    <div>
        <div class="mx-[10px] md:mx-[50px] flex justify-between mt-[40px]">
          <p class="text-fuente text-[40px]">Pacientes</p>
        </div>
        
        <div class="mx-[10px] md:mx-[50px] md:flex justify-between block">
          @csrf
          <input wire:model="filtroNombre" wire:input="actualizarFiltroNombre" name="filtroNombre" type="text" class="input-pdv w-[100px] mt-[50px] md:w-[170px]" placeholder="Buscar...">
          
          @livewire('pacientes.crear')
    
        </div>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg md:mx-[50px] my-[25px]">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                          Nombre (S)
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Apellido 1
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Apellido 2
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Correo
                      </th>
                      <th scope="col" class="px-6 py-3">
                        N&uacute;mero
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Fecha de Nacimiento
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Genero
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Nombre del Contacto
                      </th>
                      <th scope="col" class="px-6 py-3">
                        N&uacute;mero del Contacto
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Correo del Contacto
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Parentesco
                      </th>
                      <th scope="col" class="px-6 py-3">
                        
                      </th>
                      <th scope="col" class="px-6 py-3">
        
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($pacientes as $paciente)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                          <span >{{$paciente->nombre}}</span>
                      </td>
                      <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->apellido_1}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->apellido_2}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->correo}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->numero}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{\Carbon\Carbon::parse($paciente->fecha_nac)->format('d/m/Y')}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->Genero}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->contacto_nombre}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->contacto_numero}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->contacto_correo}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$paciente->contacto_parentesco}}</span>
                    </td>
                    <td class="px-6 py-4 text-right"  wire:click="editar({{ $paciente->id }})">
                      <button class="font-medium text-blue-600 dark:text-blue-600 hover:underline">Editar</button>
                    </td>      
                    <td class="px-6 py-4 text-right">
                        <button class="font-medium text-blue-600 dark:text-rojo hover:underline" wire:click="eliminar({{ $paciente->id }})">Eliminar</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          <div class="px-[10px] py-[10px] bg-gray-700">
            {{ $pacientes->links()}}
        </div>
    
        </div>
      </div>
      
    
</div>
