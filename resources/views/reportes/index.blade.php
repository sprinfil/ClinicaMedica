@extends('layouts.principal')

@section('titulo')
    Reportes
@endsection

@section('contenido')
    @livewire('reportes.index')
@endsection