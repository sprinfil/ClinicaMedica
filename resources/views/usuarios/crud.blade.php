@extends('layouts.principal')
@section('titulo','usuarios')
@section('contenido')
    @livewire('usuarios.usuarios')
    @livewire('usuarios.editar')
    @livewire('usuarios.eliminar')
@endsection