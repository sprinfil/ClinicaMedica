<div>
    <button class="btn-primary md:mt-[50px] mt-[20px]" wire:click="$set('esconder', '')">+ Nuevo</button>

    <div class="{{$esconder}}">

    <!--///////Div para agregar transparencia//////-->
        <div class="bg-black w-screen z-[10] absolute top-0 left-0 opacity-60 h-full"></div>

        <!--///////Div contenedor para centrar el modal//////-->
        <div class="w-screen h-screen z-[30] absolute top-0 left-0 items-center justify-center flex">
    
               <!--///////Contenedor del modal//////-->
            <div class="bg-negro-menu rounded-md overflow-auto md:w-[800px] w-full md:h-auto h-[700px]">

                  <!--///////Icono del modal (contenedor superior)//////-->
                  <div class="w-full h-[200px] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-[150px] text-negro-fondo">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>                      
                  </div>


                   <form wire:submit="save">
                                        <!--///////Contenedor del formulario (contenedor main)//////-->
                        @csrf
                        <div class="placeholder:w-full h-auto md:px-[60px] px-[30px] grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="usuario" name="usuario" wire:model="usuario" value="{{old('usuario')}}">
                                @error('usuario')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Nombre(s)" name="nombre" wire:model="nombre" value="{{old('nombre')}}" >
                                @error('nombre')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Apellido 1" name="apellido_1" wire:model="apellido_1" value="{{old('apellido_1')}}" >
                                @error('apellido_1')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Apellido 2" name="apellido_2" wire:model="apellido_2" value="{{old('apellido_2')}}" >
                                @error('apellido_2')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
                                
                            </div>

                            <div>
                                <input type="password" class="input-pdv w-full text-[20px] mb-3 " placeholder="clave" name="clave" wire:model="clave" value="{{old('clave')}}" >
                                @error('clave')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                                <p class="text-fuente mb-2">Puesto</p>
                                <select name="Puesto" class="input-pdv w-full text-[20px] mb-3" wire:model="Puesto" value="{{old('Puesto')}}" >
                                    <option value="" >Seleccionar</option>
                                    <option value="Medico" >Medico</option>
                                    <option value="Recepcionista">Recepcionista</option>
                                </select>
                                @error('Puesto')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                                <p class="text-fuente mb-2">Tipo de usuario</p>
                                <select name="Tipo" name="tipo" class="input-pdv w-full text-[20px] mb-3 " wire:model="Tipo" value="{{old('Tipo')}}" >
                                    <option value="" >Seleccionar</option>
                                    <option value="Empleado" >Empleado</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                @error('Tipo')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
                            </div>
                        </div>          
                    
                    
                        <!--///////Botones (contenedor inferior)//////-->
                        <div class="bg-negro-fondo w-full h-[100px] flex justify-end py-5 mt-[50px]">
                            <button class="btn-primary right-0 mr-5 bg-rojo" wire:click="cancel"> Cancelar </button>
                            <button class="btn-primary right-0 mr-5" type="submit"> Aceptar </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
