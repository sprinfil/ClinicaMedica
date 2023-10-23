@extends('layouts.principal')

@section('titulo')
    Expedientes
@endsection

@section('contenido')

    @livewire('historials.historiaOdontologica.editar',['tratamiento_id'=>$tratamiento_id, 'paciente_id' => $paciente_id])

@endsection

@section('js')


    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>




<script>

        lightbox.option({
      'resizeDuration': 20,
      'wrapAround': true,
      'fadeDuration': 10,
    })


</script>
@endsection

