<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('historial_medico') }}" class="underline text-blue-500">Expedientes</a>
        /
        <a href="{{ route('expediente', ['paciente_id' => $paciente->id]) }}"
            class="underline text-blue-500">{{ $paciente->getFullNombre($paciente->id) }}</a>
        /
        <a href="" class="underline text-blue-500">Tratamientos</a>
    </div>


    <div class="mx-2 md:mx-[60px] ">
        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">Tratamientos</p>
                <p class="text-fuente text-[25px]"> {{ $paciente->getFullNombre($paciente->id) }}</p>
                <!--opciones-->
                <button class="btn-primary mt-[10px]"
                    wire:click="historia_odontologica_create({{ $paciente->id }})">Agregar +</button>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  my-[25px] no-scrollbar">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente">
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
                        <th scope="col" class="px-6 py-3">
                            Metodo de pago
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($tratamientos)
                    @foreach ($tratamientos as $tratamiento)
                        <tr class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400 hover:bg-gray-50 dark:hover:bg-gray-400 cursor-pointer"
                            wire:click="editar({{ $tratamiento->id }})">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>{{ $tratamiento->tratamiento }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>{{ \Carbon\Carbon::parse($tratamiento->fecha)->format('d/m/Y h:i A') }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>{{ $tratamiento->atendio->nombre }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>$ {{ $tratamiento->monto }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>{{ $tratamiento->metodo_pago }}</span>
                            </td>
                        </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
            {{ $tratamientos->links() }}
        </div>
    </div>
