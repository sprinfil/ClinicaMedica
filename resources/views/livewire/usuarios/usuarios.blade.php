<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('usuarios') }}" class="underline text-blue-500">Usuarios</a>
    </div>
    <div class="mx-2 md:mx-[60px] mt-[20px]">
        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">USUARIOS</p>
                @livewire('usuarios.crear')
            </div>
        </div>

        <div class=" md:flex justify-between block">
            @csrf
            <!--Input de busqueda-->
            <div class="relative mt-[40px]">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" class="input-pdv pl-10" placeholder="Buscar..." wire:model="FiltroNombre"
                    wire:input="actualizarFiltroNombre">
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-[25px] no-scrollbar">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente">
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
                        <tr
                        class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400 hover:bg-gray-50 dark:hover:bg-gray-400 cursor-pointer">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla" wire:click="editar({{ $usuario->id }})">
                                <span>{{ $usuario->usuario }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla" wire:click="editar({{ $usuario->id }})">
                                <span>{{ $usuario->nombre }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla" wire:click="editar({{ $usuario->id }})">
                                <span>{{ $usuario->apellido_1 }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla" wire:click="editar({{ $usuario->id }})">
                                <span>{{ $usuario->apellido_2 }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla" wire:click="editar({{ $usuario->id }})">
                                <span>{{ $usuario->Puesto }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla" wire:click="editar({{ $usuario->id }})">
                                <span>{{ $usuario->Tipo }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="font-medium text-blue-600 dark:text-rojo hover:underline"
                                    wire:click="eliminar({{ $usuario->id }})">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                {{ $usuarios->links() }}
        </div>
    </div>


</div>
