@extends('layouts.principal')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection

@section('titulo')
    Expedientes
@endsection

@section('contenido')
@livewire('historials.historiaOdontologica.subir-imagen',['paciente_id' => $paciente->id, 'tratamiento_id'=> $tratamiento->id])
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
