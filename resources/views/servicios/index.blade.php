@extends('layouts.principal')
@section('titulo','Servicios')
@section('contenido')
    @livewire('servicios.index')
    @livewire('servicios.editar')
    @livewire('servicios.eliminar')
@endsection