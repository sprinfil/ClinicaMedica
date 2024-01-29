@extends('layouts.principal')

@section('titulo')
    Expedientes
@endsection

@section('contenido')
    @livewire('historials.historiaOdontologica.crear',['paciente_id' => $paciente_id])
@endsection
