<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('citas_index') }}" class="underline text-blue-500">citas</a>
    </div>

    <div class="mx-2 md:mx-[60px] mt-[20px] overflow-auto mb-[100px] no-scrollbar">

        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">CITAS</p>
            </div>
        </div>

        <p class="mt-[30px]">Fecha</p>
        <div class="flex gap-x-4">
            <input type="date" name="" id="inputDate" class="input-pdv" wire:model="FechaPicker"
                wire:change="actualizarFecha">
            <button class="btn-primary" wire:click="reset_fecha">Hoy</button>
        </div>

        @if ($fecha != null)
       
            <div class="w-full overflow-auto no-scrollbar bg-principal rounded-md py-3 px-3  mt-[30px] shadow-lg" id="hijo">
                <div class="w-full flex justify-center ">
                    <p class="text-[30px] uppercase">AGENDA</p>
                </div>
                <div
                    class="relative w-full grid grid-cols-9 mt-[20px]  h-full overflow-auto  min-w-[1000px] no-scrollbar">
                    <div>
                        <div class="flex items-center justify-center cursor-pointer btn-primary shadow-md sticky-top h-[115px] "
                            wire:click="retroceder_fecha">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </div>

                        <div>
                            @foreach ($horas as $hora)
                                <div class="flex items-center justify-center py-4">
                                    <p>{{ $hora }}</p>
                                </div>
                            @endforeach
                        </div>

                    </div>


                    @foreach ($dias as $dia)
                        <div class="container">
                            <div class="sticky-top bg-principal py-2 shadow-md min-h-[115px]">
                                <div class="w-full flex justify-center flex-col items-center">
                                    <p class="uppercase">{{ $dia->monthName  }}</p>
                                    <p class="md:text-[20px] text-[15px] uppercase">{{ $dia->dayName }}</p>
                                </div>
                                <div class="w-full flex justify-center text-[15px] flex-col items-center">
                                    <p class="md:text-[20px] text-[15px]">{{ $dia->format('d') }}</p>
                                  
                                </div>
                            </div>
                            @foreach ($horas as $hora)
                                @if ($citas_disponibles_ocupadas[$dia->format('Y-m-d')][$hora][0] == 'ocupada')
                                    <div
                                        class=" text-fuente  py-4 cursor-pointer   ease-in duration-100 rounded-md overflow-auto no-scrollbar shadow-md max-h-[56px] h-[56px] px-1 
                                        @if($citas_disponibles_ocupadas[$dia->format('Y-m-d')][$hora][4] == 'confirmada') bg-green-800 hover:hover:bg-green-700 @else bg-terciario hover:bg-[#205753] @endif" 
                                        wire:click="show_detalle({{ "'" . $hora . "'" }},{{ "'" . $dia->dayName . "'" }},{{ "'" . $dia->format('Y') . "'" }},{{ "'" . $dia->monthName . "'" }},{{ "'" . $dia->format('d') . "'" }},{{ "'" . $dia->format('Y-m-d') . "'" }}, {{ $citas_disponibles_ocupadas[$dia->format('Y-m-d')][$hora][2] }})">
                                        <div class="flex items-center justify-center  overflow-hidden text-center">
                                            <p class="text-[13px] ">
                                                {{ $citas_disponibles_ocupadas[$dia->format('Y-m-d')][$hora][1] }}</p>
                                        </div>
                                        <div class="flex items-center justify-center overflow-hidden text-center">
                                            <p class="text-[11px]">
                                                {{ $citas_disponibles_ocupadas[$dia->format('Y-m-d')][$hora][3] }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div wire:click="show_create({{ "'" . $hora . "'" }},{{ "'" . $dia->dayName . "'" }},{{ "'" . $dia->format('Y') . "'" }},{{ "'" . $dia->monthName . "'" }},{{ "'" . $dia->format('d') . "'" }},{{ "'" . $dia->format('Y-m-d') . "'" }})"
                                        class="flex items-center justify-center py-4 cursor-pointer hover:bg-terciario ease-in duration-100 rounded-md active:bg-principal shadow-md max-h-[56px] h-[56px]">
                                        <p>---</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                    <div class="container">
                        <div class="sticky-top">
                            <div class="flex items-center justify-center cursor-pointer btn-primary shadow-md h-[115px] bg-principal text-fuente-botones"
                                wire:click ="avanzar_fecha">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-9 h-9 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        @endif
        <div class="w-full flex items-center justify-center  mt-[60px]">
            <p class="text-fuente-botones text-[20px]">PRÓXIMAS CITAS</p>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  my-[25px] no-scrollbar">
            <table class="w-full text-sm text-left text-fuente dark:text-fuente">
                <thead class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente text-center">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            FECHA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            HORA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PACIENTE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NUMERO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ATIENDE
                        </th>
                        <th colspan="3" scope="col" class="px-6 py-3 text-center ">
                            OPCIONES
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas_ordenadas as $cita)
                        <tr class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400 text-center">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>{{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('d') }} de
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->monthName }} del
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('Y') }}
                                    @if (Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('Y-m-d') == Carbon\Carbon::now()->toDateString())
                                        (HOY)
                                    @endif
                                </span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>{{ Carbon\Carbon::createFromFormat('H:i:s', $cita->hora_inicio)->format('h:i A') }} - {{ Carbon\Carbon::createFromFormat('H:i:s', $cita->hora_fin)->addMinutes(15)->format('h:i A') }}</span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>
                                    {{ $cita->pacientee->getFullNombre($cita->pacientee->id) }}
                                </span>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <a href="tel:{{ $cita->pacientee->numero }}" class="">
                                <div class="bg-fuente shadow-md flex items-center justify-center py-2 px-1 cursor-pointer hover:bg-[#ADB0B5] transition ease-in-out delay-50 rounded-md">
                                    {{ $cita->pacientee->numero }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9  text-green-600 bg-principal rounded-md p-1 h-9 ml-5 cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                      </svg>
                                </div>
                            </a>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>
                                    {{ $cita->atiendee->nombre }}
                                </span>
                            </td>
                            <td wire:click="confirmar_cita({{ $cita->id }})" scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones text-center"
                                id="casilla">
                                @if ($cita->confirmada)
                                    <div
                                        class="bg-green-600 py-2 text-fuente rounded-md shadow-md cursor-pointer hover:bg-green-700 transition ease-in-out delay-40 px-4">
                                        Confirmada</div>
                                @else
                                    <div
                                        class="bg-terciario py-2 text-fuente rounded-md shadow-md cursor-pointer hover:bg-[#205753] transition ease-in-out delay-40 px-4">
                                        No confirmada</div>
                                @endif
                            </td>
                            <td wire:click="cobrar_cita({{ $cita->pacientee->id }})" scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones text-center"
                                id="casilla">
                                <div
                                class="bg-terciario py-2 text-fuente rounded-md shadow-md cursor-pointer hover:bg-[#205753] transition ease-in-out delay-40 px-4">
                                Cobrar Cita</div>

                            </td>
                            <td wire:click="cancelar_cita({{ $cita->id }})" class="px-6 py-4">
                                <div
                                    class="bg-rojo text-center py-2 text-fuente rounded-md shadow-md cursor-pointer hover:bg-red-600 transition ease-in-out delay-40 px-4">
                                    Cancelar cita</div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $citas_ordenadas->links() }}
        </div>
    </div>


</div>

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('cancelar_cita', event => {
            Swal.fire({
                title: "¿Finalizar cita?",
                text: "La cita se quitara de la agenda",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.dispatch('cerrar_detalle')
                    @this.dispatch('cancelar_cita_bd')
                    Swal.fire({
                        title: "Cancelado!",
                        text: "La cita se ha cancelado",
                        icon: "success"
                    });
                }
            });
        });
    </script>
@endsection
