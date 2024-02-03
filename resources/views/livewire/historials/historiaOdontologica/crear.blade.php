<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('pacientes') }}" class="underline text-blue-500">Pacientes</a>
        /
        <a href="{{ route('expediente', ['paciente_id' => $paciente->id]) }}"
            class="underline text-blue-500">{{ $paciente->getFullNombre($paciente->id) }}</a>
        /
        <a href="{{ route('historia_odontologica', ['paciente_id' => $paciente->id]) }}"
            class="underline text-blue-500">Tratamientos</a>
        /
        <a href="" class="underline text-blue-500">Nuevo Tratamiento</a>
    </div>
    <div class="mx-2 md:mx-[60px] ">
        <!--Cabecera-->
        <div
            class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">Nuevo Tratamiento</p>
                <p class="text-fuente text-[25px]"> {{ $paciente->getFullNombre($paciente->id) }}</p>
            </div>
        </div>

        <!--CONTENEDOR PRINCIPAL-->
        <div class="mt-[20px]">
            <!--ERROR-->
            @if ($error)
                <div class="w-full h-[50px] bg-red-500 rounded-md mb-[30px] items-center flex px-8">
                    <p class="text-white">llene todos los campos</p>
                </div>
            @endif

            <!--FECHA Y MEDICOS-->
            <div class="flex flex-wrap gap-5">
                <div>
                    <p class="text-[20px]">Fecha</p>
                    <input type="text" class="input-pdv" wire:model="fecha" disabled>
                </div>
                <div>
                    <p class="text-[20px]">Atendio</p>
                    <select name="" id="" class="input-pdv" wire:model="atendio">
                        <option value="">--SELECCIONAR--</option>
                        @foreach ($medicos as $medico)
                            <option value="{{ $medico->id }}">{{ $medico->getnombreCompleto() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!--SERVICIOS-->
            <div class="mt-[60px] flex flex-wrap gap-5 items-end">
                <div>
                    <p class="text-[20px]">Servicios</p>
                    <select name="" id="" class="input-pdv" wire:model="servicio_seleccionado">
                        <option value="">--SELECCIONAR--</option>
                        @foreach ($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button class="btn-primary h-[42px]" wire:click="agregar_servicio"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>

            </div>

            <!--TABLA PUNTO DE VENTA-->
            <div>
                <!--CONTENEDOR-->
                <div class="md:grid grid-cols-2 gap-10 ">
                    <!--TABLA-->
                    <div>
                        <div
                            class="relative overflow-x-auto shadow-md sm:rounded-lg  my-[25px] no-scrollbar min-h-[230px]">
                            <table class="w-full text-sm text-left text-fuente dark:text-fuente">
                                <thead
                                    class="text-xs text-fuente uppercase bg-gray-50 dark:bg-terciario dark:text-fuente text-center">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Descripcion
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Cantidad
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio Unitario
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Total
                                        </th>
                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tabla_punto_venta != null)

                                        @foreach ($tabla_punto_venta as $servicio)
                                            <tr
                                                class="bg-white border-b dark:bg-[#E1E1E1] dark:border-gray-400  text-center">

                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones "
                                                    id="casilla">
                                                    <span>
                                                        {{ $servicio['nombre'] }}
                                                    </span>
                                                </td>
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones"
                                                    id="casilla">
                                                    <span>
                                                        {{ $servicio['cantidad'] }}
                                                    </span>
                                                </td>
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones "
                                                    id="casilla">
                                                    <span>
                                                       $ {{ number_format($servicio['unitario'] ,2) }}
                                                    </span>
                                                </td>
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones "
                                                    id="casilla">
                                                    <span>
                                                        $ {{ $servicio['total'] }}
                                                    </span>
                                                </td>
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-fuente-botones "
                                                    id="casilla">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6 text-red-500 cursor-pointer hover:text-red-800 ease-out duration-100"
                                                            wire:click="quitar_servicio({{ $servicio['numero_servicio'] }})">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18 18 6M6 6l12 12" />
                                                        </svg>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <p class="text-[20px]">Notas:</p>
                            <textarea name="nota" id="" rows="6" class="input-pdv w-full mb-3" wire:model="nota"></textarea>
                        </div>
                    </div>
                    <!--METODO PAGO-->
                    <div class="">
                        <div class="mt-[10px] flex-col md:items-end flex w-[400px] text-[25px]">
                            @if ($metodo_pago == 'DOLAR')
                                <p class="">SUBTOTAL USD $ {{ number_format($total_usd, 2) }}</p>
                                <p class="">I.V.A $ {{ number_format($impuesto,2)  }}</p>
                                <p class=" font-bold">TOTAL USD $ {{ number_format($total_impuesto, 2) }}</p>

                                <p class="mt-[20px]">CAMBIO USD $ {{ number_format($cambio_usd, 2) }}</p>
                                <p class="">CAMBIO MXN $ {{ number_format($cambio, 2) }}</p>
                            @else
                                <p class="">SUBTOTAL MXN $ {{ number_format($total ,2) }}</p>
                                <p class="">I.V.A $ {{ number_format($impuesto ,2) }}</p>
                                <p class=" font-bold">TOTAL MXN $ {{ number_format($total_impuesto, 2) }}</p>
                                @if ($metodo_pago == 'EFECTIVO')
                                    <p class=" mt-[20px]">CAMBIO MXN $ {{ number_format($cambio,2)  }}</p>
                                @endif
                            @endif
                        </div>
                        <div class="md:w-[400px] px-[20px] mb-[50px]">
                            <div class="mt-[10px] ">
                                <p class="text-[20px]">Metodo de pago</p>
                                <select name="" id="" class="input-pdv w-full mr-[30px]"
                                    wire:model = "metodo_pago" wire:change="actualizar_metodo_pago">
                                    <option value="">--SELECCIONAR--</option>
                                    <option value="EFECTIVO">EFECTIVO</option>
                                    <option value="TARJETA DEBITO">TARJETA DEBITO</option>
                                    <option value="TARJETA CREDITO">TARJETA CREDITO</option>
                                    <option value="DOLAR">DOLAR</option>
                                </select>
                            </div>

                            @if ($metodo_pago == 'EFECTIVO')
                                <p class="text-[20px] mt-[20px]">Pago con...</p>
                                <div class="mt-[10px]">
                                    <input type="number" class="input-pdv w-full" placeholder="MXN"
                                        wire:model="pago_con_mxn" wire:input="actualizar_cambio">
                                </div>
                            @endif

                            @if ($metodo_pago == 'TARJETA DEBITO')
                                <div class="mt-[10px]">
                                    <input type="number" class="input-pdv w-full" placeholder="REFERENCIA"
                                        wire:model="referencia_tarjeta_debito">
                                </div>
                            @endif

                            @if ($metodo_pago == 'DOLAR')
                                <div class="mt-[10px]">
                                    <input type="number" class="input-pdv w-full" placeholder="USD"
                                        wire:model="pago_con_usd" wire:input="actualizar_cambio">
                                </div>
                            @endif


                            @if ($metodo_pago == 'TARJETA CREDITO')
                                <div class="mt-[10px]">
                                    <input type="number" class="input-pdv w-full" placeholder="REFERENCIA"
                                        wire:model="referencia_pago_tarjeta_credito">
                                </div>
                            @endif


                            <div class="mt-[10px]">
                                <button class="btn-primary w-full" wire:click="generar_tratamiento">Aceptar</button>
                            </div>


                        </div>

                    </div>
                </div>
            </div>



            <!--FIN-->
        </div>

    </div>
</div>
