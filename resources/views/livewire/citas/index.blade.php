<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('citas_index') }}" class="underline text-blue-500">citas</a>
    </div>

    <div class="mx-2 md:mx-[60px] mt-[20px] overflow-auto mb-[100px] no-scrollbar">

        <!--Cabecera-->
        <div class=" w-full h-full py-2 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">CITAS</p>
            </div>
            <div class=" md:mx-[50px] mx-2 mt-[20px]">
                <a href="https://calendar.google.com/calendar">
                    <button class="btn-primary">Google Calendar</button>
                </a>
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
                                <div class="flex items-center justify-center py-2">
                                    <p>{{ $hora }}</p>
                                </div>
                            @endforeach
                        </div>

                    </div>


                    @foreach ($dias as $dia)
                        <div class="container ">
                            <div class="sticky-top bg-principal py-2 shadow-md min-h-[115px] ">
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
                                        class=" text-fuente  py-2 cursor-pointer   ease-in duration-100 rounded-md overflow-auto no-scrollbar shadow-md max-h-[56px] h-[56px] px-1 
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
                                        class="flex items-center justify-center py-2 cursor-pointer hover:bg-terciario ease-in duration-100 rounded-md active:bg-principal shadow-md max-h-[56px] h-[56px]">
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
                                class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('d/m/Y') }}
                                    {{-- {{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('d') }} de
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->monthName }} del
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('Y') }} --}}
                                    @if (Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('Y-m-d') == Carbon\Carbon::now()->toDateString())
                                        (HOY)
                                    @endif
                                </span>
                            </td>
                            <td scope="row"
                                class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>{{ Carbon\Carbon::createFromFormat('H:i:s', $cita->hora_inicio)->format('h:i A') }} - {{ Carbon\Carbon::createFromFormat('H:i:s', $cita->hora_fin)->addMinutes(15)->format('h:i A') }}</span>
                            </td>
                            <td scope="row"
                                class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>
                                    {{ $cita->pacientee->getFullNombre($cita->pacientee->id) }}
                                </span>
                            </td>
                            <td scope="row"
                                class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <div class= "flex items-center justify-center py-2 rounded-md">
                                    {{ $cita->pacientee->numero }}
                                    <a href="https://wa.me/52{{$cita->pacientee->numero}}?text=Hola%20{{ $cita->pacientee->nombre }}%20{{ $cita->pacientee->apellido_1 }}%20{{ $cita->pacientee->apellido_2 }}%20nos%20comunicamos%20usted%20para%20la%20confirmacion%20de%20la%20cita%20en%20{{ $empresa }}%20el%20dia%20{{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('d') }}%20de%20{{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->monthName }}%20del%20{{ Carbon\Carbon::createFromFormat('Y-m-d', $cita->fecha)->format('Y') }}%20a%20las%20{{ Carbon\Carbon::createFromFormat('H:i:s', $cita->hora_inicio)->format('h:i A') }}%20esperamos%20contar%20con%20su%20confirmacion." target="_blank" class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32" stroke-width="1.5" stroke="currentColor" class="w-9  text-green-600 bg-principal hover:bg-slate-300 transition-all ease-in-out rounded-md p-1 h-9 ml-5 cursor-pointer" x="0px" y="0px" width="50" height="50">
                                            <path fill-rule="evenodd" d="M 24.503906 7.503906 C 22.246094 5.246094 19.246094 4 16.050781 4 C 9.464844 4 4.101563 9.359375 4.101563 15.945313 C 4.097656 18.050781 4.648438 20.105469 5.695313 21.917969 L 4 28.109375 L 10.335938 26.445313 C 12.078125 27.398438 14.046875 27.898438 16.046875 27.902344 L 16.050781 27.902344 C 22.636719 27.902344 27.996094 22.542969 28 15.953125 C 28 12.761719 26.757813 9.761719 24.503906 7.503906 Z M 16.050781 25.882813 L 16.046875 25.882813 C 14.265625 25.882813 12.515625 25.402344 10.992188 24.5 L 10.628906 24.285156 L 6.867188 25.269531 L 7.871094 21.605469 L 7.636719 21.230469 C 6.640625 19.648438 6.117188 17.820313 6.117188 15.945313 C 6.117188 10.472656 10.574219 6.019531 16.054688 6.019531 C 18.707031 6.019531 21.199219 7.054688 23.074219 8.929688 C 24.949219 10.808594 25.980469 13.300781 25.980469 15.953125 C 25.980469 21.429688 21.523438 25.882813 16.050781 25.882813 Z M 21.496094 18.445313 C 21.199219 18.296875 19.730469 17.574219 19.457031 17.476563 C 19.183594 17.375 18.984375 17.328125 18.785156 17.625 C 18.585938 17.925781 18.015625 18.597656 17.839844 18.796875 C 17.667969 18.992188 17.492188 19.019531 17.195313 18.871094 C 16.894531 18.722656 15.933594 18.40625 14.792969 17.386719 C 13.90625 16.597656 13.304688 15.617188 13.132813 15.320313 C 12.957031 15.019531 13.113281 14.859375 13.261719 14.710938 C 13.398438 14.578125 13.5625 14.363281 13.710938 14.1875 C 13.859375 14.015625 13.910156 13.890625 14.011719 13.691406 C 14.109375 13.492188 14.058594 13.316406 13.984375 13.167969 C 13.910156 13.019531 13.3125 11.546875 13.0625 10.949219 C 12.820313 10.367188 12.574219 10.449219 12.390625 10.4375 C 12.21875 10.429688 12.019531 10.429688 11.820313 10.429688 C 11.621094 10.429688 11.296875 10.503906 11.023438 10.804688 C 10.75 11.101563 9.980469 11.824219 9.980469 13.292969 C 9.980469 14.761719 11.050781 16.183594 11.199219 16.382813 C 11.347656 16.578125 13.304688 19.59375 16.300781 20.886719 C 17.011719 21.195313 17.566406 21.378906 18 21.515625 C 18.714844 21.742188 19.367188 21.710938 19.882813 21.636719 C 20.457031 21.550781 21.648438 20.914063 21.898438 20.214844 C 22.144531 19.519531 22.144531 18.921875 22.070313 18.796875 C 21.996094 18.671875 21.796875 18.597656 21.496094 18.445313 Z"></path>
                                            </svg>
                                    </a>
                                    <a href="tel:{{ $cita->pacientee->numero }}" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9  text-blue-600 bg-principal hover:bg-slate-300 transition-all ease-in-out rounded-md p-1 h-9 ml-1 cursor-pointer">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                            </svg>
                                    </a>
                                </div>
                            </td>
                            <td scope="row"
                                class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                id="casilla">
                                <span>
                                    {{ $cita->atiendee->nombre }} {{ $cita->atiendee->apellido_1 }}
                                </span>
                            </td>
                            <td wire:click="confirmar_cita({{ $cita->id }})" scope="row"
                                class="font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones text-center"
                                id="casilla">
                                @if ($cita->confirmada)
                                    <div
                                        class="bg-green-600 py-2 text-fuente rounded-md shadow-md cursor-pointer hover:bg-green-700 transition ease-in-out delay-40 px-2 group relative flex items-center justify-center">
                                        <div class="absolute bottom-full hidden group-hover:block text-slate-800 font-extralight">
                                            Estatus: Confirmada
                                        </div>   
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                          </svg>
                                    </div>
                                @else
                                    <div
                                        class="bg-red-500 py-2 text-fuente rounded-md shadow-md cursor-pointer hover:bg-[#a93939] transition ease-in-out delay-40 px-2 group relative flex items-center justify-center">
                                        <div class="absolute bottom-full hidden group-hover:block text-slate-800 font-extralight">
                                            Estatus: No Confirmada
                                        </div>   
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                          </svg>                                          
                                    </div>
                                @endif
                            </td>
                            <td wire:click="cobrar_cita({{ $cita->pacientee->id }})" scope="row"
                                class="font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones text-center"
                                id="casilla">
                                <div
                                    class="bg-[#5685e3] py-2 text-fuente rounded-md shadow-md cursor-pointer hover:bg-[#3d5fa4] transition ease-in-out delay-40 px-2 group relative flex items-center justify-center">
                                    <div class="absolute bottom-full hidden group-hover:block text-slate-800 font-extralight">
                                        Cobrar Cita
                                    </div>   
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                      </svg>                                
                                </div>
                            </td>
                            <td wire:click="cancelar_cita({{ $cita->id }})" scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones text-center"
                                id="casilla">
                                <div
                                    class="bg-rojo py-2 text-center ml-2 mr-6 text-white rounded-md shadow-md cursor-pointer hover:bg-red-600 transition ease-in-out delay-40 px-2 group relative flex items-center justify-center">
                                    <div class="absolute bottom-full hidden group-hover:block text-slate-800 font-extralight">
                                        Eliminar Cita
                                    </div>   
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                      </svg>                                      
                                </div>
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
