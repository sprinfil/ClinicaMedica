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
                            Puesto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            status
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
                                <span>{{ $usuario->Puesto }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla" wire:click="editar({{ $usuario->id }})">
                                <span>{{ $usuario->Tipo }}</span>
                            </td>
                            <td scope="row"
                            class="px-6 py-4 font-medium  whitespace-nowrap dark:text-fuente-botones"
                            id="casilla" wire:click="editar({{ $usuario->id }})">
                            <span class="text-fuente @if($usuario->status == "ACTIVO")bg-green-600 @else bg-red-500 @endif px-3 py-2 rounded-lg">{{ $usuario->status }}</span>
                        </td>
                        @if($usuario->status == "ACTIVO")
                        <td class="px-6 py-4 text-right">
                            <button class="font-medium text-fuente  hover:bg-red-600  transition ease-out  bg-red-500  px-3 py-3 rounded-md"
                               wire:click="eliminar({{ $usuario->id }})"> DESACTIVAR USUARIO </button>
                        </td>
                        @else
                        <td class="px-6 py-4 text-right">
                            <button class="font-medium text-fuente  hover:bg-green-700transition ease-out   bg-green-600 px-3 py-3 rounded-md"
                                wire:click="activar({{ $usuario->id }})">ACTIVAR USUARIO </button>
                        </td>
                        @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
                {{ $usuarios->links() }}
        </div>
    </div>


</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    //DESACTIVAR USUARIO
    window.addEventListener('desactivar_advertvencia', event => {
        Swal.fire({
            title: "¿Desactivar usuario?",
            text: "El usuario se dara de baja",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                @this.dispatch('baja_usuario')
                Swal.fire({
                    title: "Hecho",
                    text: "Usuario dado de baja.",
                    icon: "success"
                });
            }
        });
    });

    //ACTIVAR USUARIO
    window.addEventListener('activar_advertvencia', event => {
        Swal.fire({
            title: "¿Activar usuario?",
            text: "El usuario se activara de nuevo",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                @this.dispatch('activar_usuario')
                Swal.fire({
                    title: "Hecho",
                    text: "Usuario Activado.",
                    icon: "success"
                });
            }
        });
    });
</script>
@endsection
