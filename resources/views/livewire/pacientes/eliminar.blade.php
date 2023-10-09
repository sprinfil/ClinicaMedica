<div>
    @if($paciente_objeto != null)
    <div class="{{$esconder}}">

        <!--///////Div para agregar transparencia//////-->
            <div class="bg-black w-screen h-screen z-[10] absolute top-0 left-0 opacity-60"></div>
    
            <!--///////Div contenedor para centrar el modal//////-->
            <div class="w-screen h-screen z-[30] absolute top-0 left-0 items-center justify-center flex">
        
                   <!--///////Contenedor del modal//////-->
                <div class="bg-negro-menu w-[800px] h-auto rounded-md overflow-auto">
    
                      <!--///////Icono del modal (contenedor superior)//////-->
                      <div class="w-full h-[200px] flex items-center justify-center">
                        <p class="text-fuente text-[30px]">¿Seguro que desea eliminar el paciente?</p>
                      </div>
    
    
                       <form wire:submit="save">
                                            <!--///////Contenedor del formulario (contenedor main)//////-->
                            @csrf
                            <div class="placeholder:w-full h-auto text-center flex flex-col justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-[170px] text-negro-fondo text-center">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>

                                <p class="text-fuente text-[25px] ">{{$paciente_objeto->getFullNombre($paciente_objeto->id)}}</p>
                            </div>          
                        
                        
                            <!--///////Botones (contenedor inferior)//////-->
                            <div class="bg-negro-fondo w-full h-[100px] flex justify-end py-5">
                                <a href=""  class="btn-primary right-0 mr-5 bg-rojo items-center flex" wire:click="salir">Cancelar</a>
                                <button class="btn-primary right-0 mr-5" type="submit"> Aceptar </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
