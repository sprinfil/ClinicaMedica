<div>
    @if($servicio_objeto != null)
    <div class="{{$esconder}}">

        <!--///////Div para agregar transparencia//////-->
            <div class="bg-black w-screen h-screen z-[10] absolute top-0 left-0 opacity-60"></div>
    
            <!--///////Div contenedor para centrar el modal//////-->
            <div class="w-screen h-screen z-[30] absolute top-0 left-0 items-center justify-center flex">
        
                   <!--///////Contenedor del modal//////-->
                <div class="bg-negro-menu rounded-md overflow-auto md:w-[800px] w-full md:h-auto h-[600px]">
    
                      <!--///////Icono del modal (contenedor superior)//////-->
                      <div class="w-full h-[200px] flex items-center justify-center">
                        <p class="text-fuente text-[20px]">¿Seguro que desea eliminar el servicio?</p>
                      </div>
    
    
                       <form wire:submit="save">
                                            <!--///////Contenedor del formulario (contenedor main)//////-->
                            @csrf
                            <div class="placeholder:w-full h-auto text-center justify-center grid grid-rows-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-[150px] text-[#AFB3B8]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                  </svg>   

                                <p class="text-fuente text-[20px] ">{{$servicio_objeto->getFullNombre($servicio_objeto->id)}}</p>
                                
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
