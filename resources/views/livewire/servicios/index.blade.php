<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('servicios.index') }}" class="underline text-blue-500">Servicios</a>
    </div>
    <div class="mx-2 md:mx-[60px] mt-[20px]">
        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">SERVICIOS</p>
                @livewire('servicios.crear')
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
                <input type="text" class="input-pdv pl-10" placeholder="Buscar..." wire:model="nombreFiltro"
                    wire:input="actualizarFiltroServicio">
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-[25px] no-scrollbar">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($servicios->isNotEmpty())
                    {{ $servicios->links() }}

                        @foreach ($servicios as $servicio)
                            <tr
                            class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400 hover:bg-gray-50 dark:hover:bg-gray-400 cursor-pointer">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                    id="casilla" wire:click="editar({{ $servicio->id }})">
                                    <span class=" font-extrabold">{{ $servicio->id }}</span>
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                    id="casilla" wire:click="editar({{ $servicio->id }})">
                                    <span>{{ $servicio->nombre }}</span>
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                    id="casilla" wire:click="editar({{ $servicio->id }})">
                                    <span>{{'$ ' . $servicio->precio }}</span>
                                </td>
                                <td class="flex justify-center items-center h-[50px]"> <!-- Ajusta la altura según sea necesario -->
                                    @if ($servicio->status == 'ACTIVO')
                                            <button wire:click='deshabilitar({{ $servicio->id }})' class="bg-red-400 hover:bg-red-500 text-red-800 font-bold py-2 px-4 rounded ease-out duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>                                  
                                            </button>
                                    @else
                                        <button class="font-medium text-fuente dark:text-blue bg-blue-600 py-3 px-2 rounded-lg hover:bg-blue-700 ease-out duration-200"
                                        wire:click="habilitar({{ $servicio->id }})">Habilitar</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    {{ $servicios->links() }}
                    @else
                        <tr>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones" id="casilla">
                                    <span class=" font-extrabold">Sin Servicios Disponibles</span>
                            </td>
                        </tr>                    
                    @endif
                </tbody>

            </table>
        </div>
    </div>


</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('deshabilitar_advertencia', event => {
        Swal.fire({
            title: "¿Deseas deshabilitar el servicio?",
            text: "El servicio sera deshabilitado",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                @this.dispatch('deshabilitar_servicio')
                Swal.fire({
                    title: "Hecho",
                    text: "Servicio deshabilitado.",
                    icon: "success"
                });
            }
        });
    });

    window.addEventListener('habilitar_advertencia', event => {
        Swal.fire({
            title: "¿Deseas habilitar el servicio?",
            text: "El servicio sera habilitado",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                @this.dispatch('habilitar_servicio')
                Swal.fire({
                    title: "Hecho",
                    text: "Servicio habilitado.",
                    icon: "success"
                });
            }
        });
    });
</script>
@endsection