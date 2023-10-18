@extends('layouts.principal')

@section('titulo')
    Expedientes
@endsection

@section('contenido')

    @livewire('historials.historiaOdontologica.editar',['tratamiento_id'=>$tratamiento_id, 'paciente_id' => $paciente_id])

@endsection

