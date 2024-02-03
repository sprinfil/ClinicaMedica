@extends('layouts.principal')

@section('titulo')
    Consentimiento
@endsection

@section('contenido')

    @livewire('historials.consentimiento', ['paciente_id' => $paciente_id])

@endsection