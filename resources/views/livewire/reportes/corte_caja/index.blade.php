<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('corte_caja') }}" class="underline text-blue-500">Cortes</a>
    </div>

    <!--Div principal-->
    <div class="mx-2 md:mx-[60px] mt-[20px] overflow-auto mb-[100px] no-scrollbar">
        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">CORTES</p>
                <button class="btn-primary mt-[10px]" wire:click="create_corte_alert">+ Corte del dia</button>
            </div>
        </div>

        @if ($selected_corte != null)
            <div class="grid md:grid-cols-2 mt-[25px] grid-cols-1 gap-11">
                <!--Primera Columna-->
                <div class="px-3">
                    <!--Tabla-->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  no-scrollbar">
                        <table class="w-full text-sm text-left text-fuente dark:text-fuente">
                            <thead class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        FECHA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NOMBRE
                                    </th>
                                    <th scope="col" colspan="1" class="px-6 py-3">
                                        SUBTOTAL
                                    </th>
                                    <th scope="col" colspan="2" class="px-6 py-3">
                                        TOTAL
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cortes as $corte)
                                    <tr class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400 hover:bg-gray-50 dark:hover:bg-gray-400 cursor-pointer"
                                        wire:click="select_corte({{ $corte->id }})">
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $corte->fecha)->format('d') }}
                                                de
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $corte->fecha)->monthName }}
                                                del
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $corte->fecha)->format('Y') }}
                                            </span>
                                        </td>

                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>
                                                {{ $corte->usuario->nombre }}
                                            </span>
                                        </td>

                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>
                                                $ {{ number_format(  $corte->total_bruto, 2)}}
                                            </span>
                                        </td>

                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>
                                                $ {{ number_format(  $corte->total_neto, 2)}}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="flex justify-end items-center px-3 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 text-fuente-botones ml-[10px]">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $cortes->links() }}



                    </div>

                </div>

                <!--Segunda Columna-->
                <div class="px-3 grid grid-rows-2">

                    <!--Desglose de ingresos-->
                    <div class="h-full bg-[#E1E1E1] shadow-lg  rounded-lg ease-out duration-300 overflow-hidden">
                        <div class="w-full bg-negro-menu text-center py-2">
                            <p class="text-fuente text-sm">Desglose de Ingresos</p>
                        </div>
                        <div class="ml-[30px] mt-[10px]">
                            <p class="text-fuente-botones text-sm">Corte del
                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $selected_corte->fecha)->format('d') }}
                                de
                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $selected_corte->fecha)->monthName }} del
                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $selected_corte->fecha)->format('Y') }}</p>
                        </div>

                        <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2 ">
                            <div>
                                <p class="text-fuente-botones">Efectivo</p>
                                <input class="input-pdv w-full mb-3 text-[15px]"
                                    value="{{ $selected_corte ? number_format(  $selected_corte->efectivo , 2): '' }}" disabled>
                                <p class="text-fuente-botones">Dolar</p>
                                <input class="input-pdv w-full mb-3 text-[15px]"
                                    value="{{ $selected_corte ?  number_format(  $selected_corte->dolares , 2): '' }}" disabled>
                            </div>
                            <div>
                                <p class="text-fuente-botones">Tarjeta Credito</p>
                                <input class="input-pdv w-full mb-3 text-[15px]"
                                    value="{{ $selected_corte ? number_format( $selected_corte->tarjeta_credito, 2): '' }}" disabled>
                                <p class="text-fuente-botones">Tarjeta Debito</p>
                                <input class="input-pdv w-full mb-3 text-[15px]"
                                    value="{{ $selected_corte ? number_format( $selected_corte->tarjeta_debito , 2): '' }}" disabled>
                                <p class="text-fuente-botones">Impuestos Cobrados</p>
                                <input class="input-pdv w-full mb-3 text-[15px]" value="{{number_format( $impuestos_cobrados , 2) }}"
                                    disabled>
                            </div>
                        </div>


                    </div>


                    <!--Tabla-->
                    <div class="relative overflow-x-auto  rounded-md no-scrollbar mt-[10px]  max-h-[300px]">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-md ">
                            <thead class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente">
                                <tr>
                                    <th scope="col" class="px-2 py-3">
                                        Hora
                                    </th>
                                    <th scope="col" class="px-2 py-3">
                                        Atendio
                                    </th>
                                    <th scope="col" class="px-2 py-3">
                                        PACIENTE
                                    </th>
                                    <th scope="col" class="px-2 py-3">
                                        TOTAL
                                    </th>
                                    <th scope="col" class="px-2 py-3">
                                        Metodo de pago
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tratamientos as $tratamiento)
                                    <tr class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400 hover:bg-gray-50 dark:hover:bg-gray-400 cursor-pointer"
                                        wire:click="open_tratamiento({{ $tratamiento->paciente->id }}, {{ $tratamiento->id }})">
                                        <td scope="row"
                                            class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>{{ \Carbon\Carbon::parse($tratamiento->fecha)->format('h:i A') }}</span>
                                        </td>
                                        <td scope="row"
                                            class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>{{ $tratamiento->atendio->nombre }}</span>
                                        </td>
                                        <td scope="row"
                                            class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>{{ $tratamiento->paciente->getFullNombre($tratamiento->paciente->id) }}</span>
                                        </td>
                                        <td scope="row"
                                            class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>$ {{number_format(  $tratamiento->monto + $tratamiento->impuesto  , 2)  }}</span>
                                        </td>
                                        <td scope="row"
                                            class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                            id="casilla">
                                            <span>{{ $tratamiento->metodo_pago }}</span>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>


                </div>


            </div>
        @else
            <p class="mt-[30px] text-[20px]">
                aun no hay cortes.
            </p>
        @endif



    </div>
</div>
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('create_corte_alert', event => {
            Swal.fire({
                title: "¿Crear Corte del día?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.dispatch('validar_corte')
                }
            });
        });

        window.addEventListener('existe_corte', event => {
            Swal.fire({
                title: "Ya hay un corte para esta fecha, ¿Sobreescribir corte?",
                text: "El corte se volvera a crear",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.dispatch('create_corte')
                }
            });
        });

        window.addEventListener('created_corte', event => {
            Swal.fire({
                title: "Corte Creado",
                text: "El corte se ha creado con éxito",
                icon: "success"
            });
        });
    </script>
@endsection
