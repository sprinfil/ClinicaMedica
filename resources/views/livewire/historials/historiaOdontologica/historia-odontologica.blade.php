<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('historial_medico') }}" class="underline text-blue-500">Expedientes</a>
        /
        <a href="" class="underline text-blue-500">Tratamientos</a>
    </div>


    <div class="mx-2 md:mx-[60px] ">

        <!--Cabecera-->
        <div class=" w-full h-full bg-terciario shadow-lg rounded-md overflow-x-hidden">
            <!--Titulo -->
            <div class="justify-between mt-[20px] mx-[20px]">
                <p class="text-fuente text-[40px] mb-[20px]">Tratamientos</p>
                <!--opciones-->
                <div class="mb-[20px]">
                    <button class="btn-primary mt-[10px]"
                        wire:click="historia_odontologica_create({{ $paciente->id }})">Agregar +</button>
                    <button class="btn-primary mt-[10px]" wire:click="toggleVerInfo">Ver información del
                        paciente</button>
                </div>
            </div>
        </div>


        <!--Datos del paciente-->
        <div
            class="h-full {{ $esconder }} bg-[#E1E1E1] shadow-lg mt-[20px] rounded-lg ease-out duration-300 overflow-hidden">
            <div class="w-full bg-negro-menu text-center py-2">
                <p class="text-fuente text-[20px]">Informacion del paciente</p>
            </div>
            <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2 ">
                <div>
                    <p class="text-fuente-botones text-[20px] mb-[20px]">Información del paciente</p>
                    <p class="text-fuente-botones">Nombre:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]"
                        value="{{ $paciente->getFullNombre($paciente->id) }}" disabled>
                    <p class="text-fuente-botones">Correo:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->correo }}" disabled>
                    <p class="text-fuente-botones">Número:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->numero }}" disabled>
                    <p class="text-fuente-botones">Edad:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $edad }}" disabled>
                    <p class="text-fuente-botones">Genero:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->Genero }}" disabled>
                </div>
                <div>
                    <p class="text-fuente-botones text-[20px] mb-[20px]">Contacto de emergencia</p>
                    <p class="text-fuente-botones">Nombre:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->contacto_nombre }}" disabled>
                    <p class="text-fuente-botones">Número:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->contacto_numero }}" disabled>
                    <p class="text-fuente-botones">Correo:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->contacto_correo }}" disabled>
                    <p class="text-fuente-botones">Parentesco:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->contacto_parentesco }}"
                        disabled>
                </div>
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
                    @foreach ($tratamientos as $tratamiento)
                        <tr class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400 hover:bg-gray-50 dark:hover:bg-gray-400"
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
                </tbody>
            </table>
            {{ $tratamientos->links() }}
        </div>
    </div>
