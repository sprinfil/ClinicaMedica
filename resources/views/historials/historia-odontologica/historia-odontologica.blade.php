@extends('layouts.principal')

@section('titulo')
    Expedientes
@endsection

@section('contenido')

    @livewire('historials.historiaOdontologica.historia-odontologica', ['paciente_id' => $paciente_id])

@endsection

