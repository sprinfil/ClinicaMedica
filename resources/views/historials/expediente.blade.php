@extends('layouts.principal')

@section('titulo')
    Expediente
@endsection

@section('contenido')
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('pacientes') }}" class="underline text-blue-500">Pacientes</a>
        /
        <a href="" class="underline text-blue-500">{{ $paciente->getFullNombre($paciente->id) }}</a>
    </div>

    <div class="mx-2 md:mx-[60px] mt-[20px]">

        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">Expediente</p>
                <p class="text-fuente text-[25px]"> {{ $paciente->getFullNombre($paciente->id) }}</p>
            </div>
        </div>

        <!--Tarjetas-->
        <div class="mt-[25px] grid md:grid-cols-3 grid-cols-1 gap-4">


            <!--Historial Clinico-->
            <a href="{{ route('historia-clinica', ['paciente_id' => $paciente->id]) }}">
                <div
                    class="w-full h-[100px] transition ease-in-out bg-[#f2f2f2] hover:bg-[#e1e1e1] shadow-lg rounded-md overflow-x-hidden flex justify-center items-center cursor-pointer  px-4">
                    <p class="text-fuente-botones text-[20px]">Historial Clinico</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-fuente-botones ml-[10px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>
            </a>


            <!--Tratamientos-->
            <a href="{{ route('historia_odontologica', ['paciente_id' => $paciente->id]) }}">
                <div
                    class="w-full h-[100px] transition ease-in-out bg-[#f2f2f2] hover:bg-[#e1e1e1]  shadow-lg rounded-md overflow-x-hidden flex justify-center items-center cursor-pointer  px-4">
                    <p class="text-fuente-botones text-[20px]">Tratamientos</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-fuente-botones ml-[10px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>
            </a>


            <!--Tratamientos-->
            <a href="{{ route('consentimiento', ['paciente_id' => $paciente->id]) }}">
                <div
                    class="w-full h-[100px] transition ease-in-out bg-[#f2f2f2] hover:bg-[#e1e1e1]   shadow-lg rounded-md overflow-x-hidden flex justify-center items-center cursor-pointer  px-4">
                    <p class="text-fuente-botones text-[20px]">Consentimiento</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-fuente-botones ml-[10px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>
            </a>

            <a href="{{ route('radiografias', ['paciente_id' => $paciente->id]) }}">
                <!--Tratamientos-->
                <div
                    class="w-full h-[100px] transition ease-in-out bg-[#f2f2f2] hover:bg-[#e1e1e1]  shadow-lg rounded-md overflow-x-hidden flex justify-center items-center cursor-pointer px-4">
                    <p class="text-fuente-botones text-[20px]">Radiografias</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-fuente-botones ml-[10px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>
            </a>

        </div>

        <!--Datos del paciente-->
        <div class="h-full bg-[#E1E1E1] shadow-lg mt-[20px] rounded-lg ease-out duration-300 overflow-hidden">
            <div class="w-full bg-negro-menu text-center py-2">
                <p class="text-fuente text-[20px]">Informacion del paciente</p>
            </div>
            <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2 ">
                <div>
                    <p class="text-fuente-botones text-[20px] mb-[20px]">Información del paciente</p>
                    <p class="text-fuente-botones">Nombre:</p>
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->getFullNombre($paciente->id) }}"
                        disabled>
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
                    <input class="input-pdv w-full mb-3 text-[15px]" value="{{ $paciente->contacto_parentesco }}" disabled>
                </div>
            </div>

        </div>
    </div>
@endsection
