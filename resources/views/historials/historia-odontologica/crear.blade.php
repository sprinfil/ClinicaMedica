@extends('layouts.principal')

@section('titulo')
    Expedientes
@endsection

@section('contenido')
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

            <div class="h-full bg-[#E1E1E1] shadow-lg pb-[40px] mt-[20px] rounded-lg">
                <div class="w-full bg-negro-menu text-center py-2 rounded-t-lg">
                    <p class="text-fuente text-[20px]">Informacion del Tratamiento</p>
                </div>
                <form action="{{ route('historia_odontologica_store', ['paciente_id' => $paciente->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <p class="text-fuente-botones">Fecha:</p>
                            <input type="datetime-local" class="input-pdv w-full mb-3 text-[20px]" name="fecha"
                                value="{{ $fechaActual }}">
                            @error('fecha')
                                <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                                </div>
                            @enderror

                            <p class="text-fuente-botones">Tratamiento:</p>
                            <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Tratamiento"
                                name="tratamiento" value="{{ old('tratamiento') }}">
                            @error('tratamiento')
                                <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                                </div>
                            @enderror

                            <p class="text-fuente-botones">Notas:</p>
                            <textarea name="nota" id="" rows="6" class="input-pdv w-full mb-3"></textarea>
                            @error('nota')
                                <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>

                            <p class="text-fuente-botones">Metodo de pago:</p>
                            <select name="metodo_pago" class="input-pdv w-full mb-3 text-[20px]">
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Efectivo">Efectivo</option>
                            </select>
                            @error('metodo_pago')
                                <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                                </div>
                            @enderror

                            <p class="text-fuente-botones">Monto:</p>
                            <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="monto"
                                name="monto" value="{{ old('monto') }}">
                            @error('monto')
                                <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}
                                </div>
                            @enderror


                            <button class="btn-primary mt-[20px] w-full" type="submit" id="submit-button">Aceptar</button>

                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection
