@extends('layouts.principal')
@section('titulo','servicios')
@section('contenido')
    @livewire('servicios.index')
    @livewire('servicios.editar')
    @livewire('servicios.eliminar')
@endsection