<div>
    <div>
        <button class="btn-primary md:mt-[50px]" wire:click="$set('esconder', '')">Nuevo +</button>
    
        <div class="{{$esconder}}">
    
        <!--///////Div para agregar transparencia//////-->
            <div class="bg-black w-screen h-screen z-[10] absolute top-0 left-0 opacity-60"></div>
    
            <!--///////Div contenedor para centrar el modal//////-->
            <div class="w-screen h-screen z-[30] absolute top-0 left-0 items-center justify-center flex">
        
                   <!--///////Contenedor del modal//////-->
                <div class="bg-fuente rounded-md overflow-auto md:w-[90%] w-full md:h-auto h-[700px]">
    
                      <!--///////Icono del modal (contenedor superior)//////-->
                      <div class="w-full h-[200px] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-[150px] text-[#AFB3B8]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>                      
                      </div>
    
    
                       <form wire:submit="save">
                                            <!--///////Contenedor del formulario (contenedor main)//////-->
                            @csrf
                            <div class="placeholder:w-full h-auto md:px-[60px] px-[30px] grid grid-cols-1 md:grid-cols-3 gap-4 py-[70px]">
                                <div>
                                    <p class="text-fuente-botones mb-2">Informaci&oacute;n del Paciente</p>

                                    <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Nombre(s)" name="nombre" wire:model="nombre" value="{{old('nombre')}}" >
                                    @error('nombre')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
    
                                    <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Apellido 1" name="apellido_1" wire:model="apellido_1" value="{{old('apellido_1')}}" >
                                    @error('apellido_1')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
    
                                    <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Apellido 2" name="apellido_2" wire:model="apellido_2" value="{{old('apellido_2')}}" >
                                    @error('apellido_2')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror    

                                    <input type="date" class="input-pdv w-full mb-3 text-[20px]" placeholder="Fecha de Nacimiento" name="fecha_nac" wire:model="fecha_nac" value="{{old('fecha_nac')}}" >
                                    @error('fecha_nac')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
                                    
                                    <select class="input-pdv w-full mb-3 text-[20px]" name="Genero" wire:model="Genero" value="{{old('Genero')}}" >  
                                        <option value="Masculino" selected>MASCULINO</option>    
                                        <option value="Femenino">FEMENINO</option>    
                                        <option value="Otro">OTRO</option>    
                                    </select>
                                    @error('Genero')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
                                </div>

                                <div>
                                    <p class="text-fuente-botones mb-2">Informaci&oacute;n de Contacto</p>

                                    <input type="email" class="input-pdv w-full mb-3 text-[20px]" placeholder="Correo" name="correo" wire:model="correo" value="{{old('correo')}}" >
                                    @error('correo')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
                                    
                                    <input type="tel" class="input-pdv w-full mb-3 text-[20px]" placeholder="N&uacute;mero Tel" name="numero" wire:model="numero" value="{{old('numero')}}" >
                                    @error('numero')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
                                    

                                </div>
    
                                <div>
                                    <p class="text-fuente-botones mb-2">Contacto de emergencia</p>
                                    
                                    <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Nombre(s)" name="contacto_nombre" wire:model="contacto_nombre" value="{{old('contacto_nombre')}}" >
                                    @error('contacto_nombre')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                                    <input type="email" class="input-pdv w-full mb-3 text-[20px]" placeholder="Correo del Contacto" name="contacto_correo" wire:model="contacto_correo" value="{{old('contacto_correo')}}" >
                                    @error('contacto_correo')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
                                    
                                    <input type="tel" class="input-pdv w-full mb-3 text-[20px]" placeholder="N&uacute;mero Tel" name="contacto_numero" wire:model="contacto_numero" value="{{old('contacto_numero')}}" >
                                    @error('contacto_numero')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                                    <select class="input-pdv w-full mb-3 text-[20px]" name="contacto_parentesco" wire:model="contacto_parentesco" value="{{old('Gencontacto_parentescoero')}}" >
                                        <option value="" disabled selected>-- SELECCIONAR --</option>    
                                        <option value="PADRE">PADRE</option>    
                                        <option value="MADRE">MADRE</option>    
                                        <option value="ESPOS@">ESPOS@</option>    
                                        <option value="CONYUGUE">CONYUGUE</option>    
                                        <option value="HIJ@">HIJ@</option>    
                                        <option value="OTRO">OTRO</option>    
                                    </select>
                                    @error('contacto_parentesco')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                                </div>
                            </div>          
                        
                        
                            <!--///////Botones (contenedor inferior)//////-->
                            <div class="bg-fuente w-full h-[100px] flex justify-end py-5"> 
                                <div class="btn-primary-red right-0 mr-5  flex justify-center items-center cursor-pointer" wire:click="cancel"><p>Cancelar</p></div>
                                <button class="btn-primary right-0 mr-5" type="submit"> Aceptar </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
    </div>
