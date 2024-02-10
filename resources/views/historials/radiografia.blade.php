@extends('layouts.principal')

@section('titulo')
    Radiografias
@endsection

@section('contenido')
<div x-data="{ imageModalOpen: false, imageSrc: '' }">

    @livewire('historials.radiografiaviewer', ['paciente_id' => $paciente_id])
</div>
@endsection