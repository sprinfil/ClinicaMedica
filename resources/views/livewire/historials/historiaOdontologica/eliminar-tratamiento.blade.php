<div>
    @if($tratamiento != null)
    <div class="{{$esconder}}">

        <!--///////Div para agregar transparencia//////-->
            <div class="bg-black w-screen h-screen z-[10] absolute top-0 left-0 opacity-60"></div>
    
            <!--///////Div contenedor para centrar el modal//////-->
            <div class="w-screen h-screen z-[30] absolute top-0 left-0 items-center justify-center flex">
        
                   <!--///////Contenedor del modal//////-->
                <div class="bg-fuente rounded-md overflow-auto md:w-[800px] w-full md:h-auto h-auto">
    
                      <!--///////Icono del modal (contenedor superior)//////-->
                      <div class="w-full h-[200px] flex items-center justify-center">
                        <p class="text-fuente-botones text-[20px]">¿Seguro que deseas eliminar {{$tratamiento->tratamiento}}?</p>
                      </div>
                      <form action="{{route('tratamiento_delete',['tratamiento_id'=>$tratamiento->id,'paciente_id'=>$paciente->id])}}" method="GET">
                        <!--///////Botones (contenedor inferior)//////-->
                        <div class="bg-fuente w-full h-[100px] flex justify-end py-5">
                            <p class="btn-primary-red right-0 mr-5  items-center flex" wire:click="salir">Cancelar</p>
                            <button class="btn-primary right-0 mr-5" wire:click="eliminar"> Aceptar </button>
                        </div>
                   

                     </form>

                </div>
            </div>
        </div>
    @endif
</div>
