@extends('layouts.principal')

@section('titulo')
    Historia Odontologica
@endsection

@section('contenido')

    @livewire('historials.historiaOdontologica.crear', ['paciente_id' => $paciente_id])

@endsection