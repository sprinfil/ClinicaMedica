<div>
  <div class=" w-full h-full py-4 bg-terciario shadow-lg pb-[40px]" >
    <div class="mx-[10px] md:mx-[50px] flex justify-between mt-[40px]">
      <p class="text-fuente text-[40px]">USUARIOS</p>
    </div>
  </div>

    <div class="mx-[10px] md:mx-[50px] md:flex justify-between block">
      @csrf
      <input 
      type="text" 
      class="input-pdv mt-[50px]" 
      placeholder="Buscar..." 
      wire:model="FiltroNombre"
      wire:input="actualizarFiltroNombre"
      >
      
      @livewire('usuarios.crear')

    </div>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg md:mx-[50px] my-[25px]">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                    Usuario
                </th>
                <th scope="col" class="px-6 py-3">
                      Nombre
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Apellido 1
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Apellido 2
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Puesto
                  </th>
                  <th scope="col" class="px-6 py-3">
                   Tipo
                  </th>
                  <th scope="col" class="px-6 py-3">
    
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $usuario)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla" wire:click="editar({{ $usuario->id }})">
                    <span >{{$usuario->usuario}}</span>
                </td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla" wire:click="editar({{ $usuario->id }})">
                      <span >{{$usuario->nombre}}</span>
                  </td> 
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla" wire:click="editar({{ $usuario->id }})">
                    <span >{{$usuario->apellido_1}}</span>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla" wire:click="editar({{ $usuario->id }})">
                    <span >{{$usuario->apellido_2}}</span>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla" wire:click="editar({{ $usuario->id }})">
                    <span >{{$usuario->Puesto}}</span>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla" wire:click="editar({{ $usuario->id }})">
                    <span >{{$usuario->Tipo}}</span>
                </td>   
                <td class="px-6 py-4 text-right">
                    <button class="font-medium text-blue-600 dark:text-rojo hover:underline" wire:click="eliminar({{ $usuario->id }})">Eliminar</button>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
      <div class="px-[10px] py-[10px] bg-gray-700">
        {{ $usuarios->links()}}
    </div>

    </div>
  </div>
  
