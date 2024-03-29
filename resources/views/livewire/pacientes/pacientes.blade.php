<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('pacientes') }}" class="underline text-blue-500">Pacientes</a>
    </div>
    <div class="mx-2 md:mx-[60px] mt-[20px]">
        <div>
            <!--Cabecera-->
            <div
                class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
                <div class="mx-[10px] md:mx-[50px]  justify-between">
                    <p class="text-fuente text-[40px]">PACIENTES</p>
                    @livewire('pacientes.crear')
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
                    <input wire:model="filtroNombre" wire:input="actualizarFiltroNombre" name="filtroNombre"
                        type="text" class="input-pdv pl-10" placeholder="Buscar...">
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  my-[25px] no-scrollbar">
                <table class="w-full text-sm text-left text-fuente dark:text-fuente">
                    <thead class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente">
                        <tr>
                            <th scope="col" class="px-2 py-2">
                                Nombre Completo
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Correo
                            </th>
                            <th scope="col" class="px-2 py-2">
                                N&uacute;mero
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Fecha de Nacimiento
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Genero
                            </th>
                            <th scope="col" class="px-2 py-2">
                              
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pacientes as $paciente)
                            <tr
                                class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400  hover:bg-gray-400 cursor-pointer">
                                <td wire:click="editar({{ $paciente->id }})" scope="row"
                                    class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones "
                                    id="casilla">
                                    <span>{{ $paciente->getFullNombre($paciente->id) }}</span>
                                </td>
                                <td wire:click="editar({{ $paciente->id }})" scope="row"
                                    class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                    id="casilla">
                                    <span>{{ $paciente->correo }}</span>
                                </td>
                                <td wire:click="editar({{ $paciente->id }})" scope="row"
                                    class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                    id="casilla">
                                    <span>{{ $paciente->numero }}</span>
                                </td>
                                <td wire:click="editar({{ $paciente->id }})" scope="row"
                                    class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                    id="casilla">
                                    <span>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d/m/Y') }}</span>
                                </td>
                                <td wire:click="editar({{ $paciente->id }})" scope="row"
                                    class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                    id="casilla">
                                    <span>{{ $paciente->Genero }}</span>
                                </td>
                                <td wire:click="" scope="row"
                                    class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap "
                                    id="casilla">
                                    <a href="{{ route('expediente', ['paciente_id' => $paciente->id]) }}">
                                        <div
                                        class=" items-center  text-fuente-botones ml-[10px] bg-amber-500 rounded-md cursor-pointer shadow-md py-1 px-1 flex hover:bg-amber-600 ease-out duration-500 h-[50px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-6 h-6 text-fuente-botones  mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                        </svg>
                                        <p class="mr-1">VER EXPEDIENTE</p>
                                    </div>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $pacientes->links() }}


            </div>
        </div>


    </div>

</div>
