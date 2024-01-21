@extends('layouts.principal')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection

@section('titulo')
    Expedientes
@endsection

@section('contenido')
    <div>
        <!--navegacion superior-->
        <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
            <a href="{{ route('historial_medico') }}" class="underline text-blue-500">Expedientes</a>
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

            <div class="h-full py-4 bg-principal shadow-lg pb-[40px] mt-[20px] rounded-lg">

                <p class="text-fuente-botones ml-[30px] mb-[30px]">Agregar Imagen (Odontológica)</p>


                <form
                    action="{{ route('historia_odontologica_clinica_subir', ['tratamiento_id' => $tratamiento->id, 'paciente_id' => $paciente->id]) }}"
                    class="dropzone mx-[30px] rounded-md" id="my-awesome-dropzone">
                </form>

                <p class="text-fuente-botones ml-[30px] mb-[30px] mt-[30px]">Agregar Imagen (Radiografía)</p>


                <form
                    action="{{ route('historia_odontologica_radiografia_subir', ['tratamiento_id' => $tratamiento->id, 'paciente_id' => $paciente->id]) }}"
                    class="dropzone mx-[30px] rounded-md" id="my-awesome-dropzone">
                </form>


                <a href="{{ route('historia_odontologica', ['paciente_id' => $paciente->id]) }}">
                    <button class="btn-primary mt-[20px] ml-[30px]">Aceptar</button>
                </a>

            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        }
    </script>
@endsection
