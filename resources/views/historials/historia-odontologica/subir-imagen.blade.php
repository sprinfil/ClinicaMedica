@extends('layouts.principal')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('titulo')
    Expedientes
@endsection

@section('contenido')

<div>
  <div class=" w-full h-full py-4 bg-terciario shadow-lg pb-[40px]">
      <div class="mx-[10px] md:mx-[50px] mt-[2px] text-fuente text-[20px]">
          <a href="{{route('historial_medico')}}" class="underline text-blue-500">Expedientes</a> 
          / 
          <a href="{{ route('historia_odontologica', ['paciente_id' => $paciente->id]) }}" class="underline text-blue-500">{{$paciente->nombre}}</a>
          /
          <a href="" class="underline text-blue-500">Nuevo Tratamiento</a>
        </div>
  
      <div class="mx-[10px] md:mx-[50px] mt-[10px]">
          <p class="text-fuente text-[40px]">AGREGAR TRATAMIENTO</p>
      </div>
  </div>

  <div class="h-full py-4 bg-terciario shadow-lg pb-[40px] mt-[20px] mx-[20px] rounded-lg">
    
        <p class="text-fuente ml-[30px] mb-[30px]">Agregar Imagen (Odontológica)</p>

        
        <form action="{{route('historia_odontologica_imagen_subir',['tratamiento_id'=>$tratamiento->id,'paciente_id'=>$paciente->id])}}"
        class="dropzone mx-[30px]"
        id="my-awesome-dropzone">
        </form>
        <a href="{{route('historia_odontologica',['paciente_id' => $paciente->id])}}">
            <button class="btn-primary mt-[20px] ml-[30px]">Aceptar</button>
        </a>

  </div>







</div>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script>
    Dropzone.options.myAwesomeDropzone = { 
      headers:{
        'X-CSRF-TOKEN' : "{{csrf_token()}}"
      },
    }
</script>
@endsection