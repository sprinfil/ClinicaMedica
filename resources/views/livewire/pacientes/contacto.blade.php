<div>
    @if($paciente_objeto != null)
    <div class="{{$esconder}}">

        <!--///////Div para agregar transparencia//////-->
            <div class="bg-black w-screen h-screen z-[10] absolute top-0 left-0 opacity-60"></div>
    
            <!--///////Div contenedor para centrar el modal//////-->
            <div class="w-screen h-screen z-[30] absolute top-0 left-0 items-center justify-center flex">
        
                   <!--///////Contenedor del modal//////-->
                <div class="bg-negro-menu rounded-md overflow-auto md:w-[800px] w-full md:h-auto h-[600px]">
    
                      <!--///////Icono del modal (contenedor superior)//////-->
                      <div class="w-full h-[200px] flex items-center justify-center">
                        <p class="text-fuente text-[20px]">Informaci&oacute;n del Contacto</p>
                      </div>
    
                        <div class="placeholder:w-full h-auto text-center justify-center grid grid-rows-4 mb-6">

                            <div class="mb-2">
                                <h3>Nombre Completo</h3>
                                <p class="text-fuente text-[20px] ">{{$paciente_objeto->getFullNombre($paciente_objeto->id)}}</p>
                            </div>

                            <div class="mb-2">
                                <h3>Tel&eacute;fono</h3>
                                <a class="text-fuente text-[20px]" target="_blank" href="https://wa.me/521{{$paciente_objeto->contacto_numero}}?text=Hola%20{{ $paciente_objeto->contacto_nombre }}"> {{ $paciente_objeto->contacto_numero }}</a>
                            </div>

                            <div class="mb-2">
                                <h3>Correo</h3>
                                <p class="text-fuente text-[20px] ">{{$paciente_objeto->contacto_correo}}</p>
                            </div>

                            <div class="mb-2">
                                <h3>Parentesco</h3>
                                <p class="text-fuente text-[20px] ">{{$paciente_objeto->contacto_parentesco}}</p>
                            </div>
                                
                        </div>          
                        
                        
                        <!--///////Botones (contenedor inferior)//////-->
                        <div class="bg-negro-fondo w-full h-[100px] flex justify-end py-5">
                            <a href=""  class="btn-primary right-0 mr-5 bg-rojo items-center flex" wire:click="salir">Cerrar</a>
                        </div>
                </div>
            </div>
        </div>
    @endif
</div>
