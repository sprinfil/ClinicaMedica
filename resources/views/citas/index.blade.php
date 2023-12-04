@extends('layouts.principal')

@section('titulo')
    Citas
@endsection

@section('contenido')
    @livewire('citas.index')
    @livewire('citas.create')
    @livewire('citas.detalle')
@endsection