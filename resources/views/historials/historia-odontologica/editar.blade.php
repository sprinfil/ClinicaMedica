@extends('layouts.principal')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection

@section('titulo')
    Expedientes
@endsection

@section('contenido')

    @livewire('historials.historiaOdontologica.editar',['tratamiento_id'=>$tratamiento_id, 'paciente_id' => $paciente_id])
    @livewire('historials.historiaOdontologica.eliminar-imagen')
    @livewire('historials.historiaOdontologica.eliminar-tratamiento')

@endsection

@section('js')

    <!--Libreria lightbox-->
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>

    <script>

         lightbox.option({
        'resizeDuration': 20,
        'wrapAround': true,
        'fadeDuration': 10,
        })

    </script>

   <!--Libreria dropzone-->
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = { 
        headers:{
            'X-CSRF-TOKEN' : "{{csrf_token()}}"
        },
        }
    </script>

@endsection

