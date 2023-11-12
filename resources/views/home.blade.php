@extends('layouts.principal')

@section('titulo')
    Home
@endsection

@section('contenido')
  <!--navegacion superior-->
 <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
    <a href="{{route('home')}}" class="underline text-blue-500">Home</a> 
</div>
<div class="mx-2 md:mx-[60px] mt-[20px]">
    <!--Cabecera-->
    <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden">
        <div class="mx-[10px] md:mx-[50px]  justify-between">
            <p class="text-fuente text-[40px] mb-[20px]">HOME</p>
        </div>
    </div>
</div>
@endsection