@extends('layouts.principal')

@section('titulo')
    Historial Clinico
@endsection

@section('contenido')

    @livewire('historials.historiaClinica.historia-clinica', ['paciente_id' => $paciente_id])

@endsection

