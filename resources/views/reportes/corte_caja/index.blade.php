@extends('layouts.principal')

@section('titulo')
    Corte
@endsection

@section('contenido')
    @livewire('reportes.corte_caja.index')
@endsection