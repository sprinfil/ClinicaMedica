@extends('layouts.principal')

@section('titulo')
    Pacientes
@endsection

@section('contenido')
    @livewire('pacientes.pacientes')
    @livewire('pacientes.editar')
    @livewire('pacientes.eliminar')
    @livewire('pacientes.contacto')
@endsection