<div>
    <div class=" w-full h-full py-4 bg-terciario shadow-lg pb-[40px]">
        <div class="mx-[10px] md:mx-[50px] mt-[2px] text-fuente text-[20px]">
            <a href="{{route('historial_medico')}}" class="underline text-blue-500">Historial Médico</a> 
            / 
            <a href="{{ route('historia_odontologica', ['paciente_id' => $paciente->id]) }}" class="underline text-blue-500">{{$paciente->nombre}}</a>
            /
            <a href="" class="underline text-blue-500">Nuevo Tratamiento</a>
          </div>
    
        <div class="mx-[10px] md:mx-[50px] mt-[10px]">
            <p class="text-fuente text-[40px]">AGREGAR TRATAMIENTO</p>
        </div>
    </div>

    <form action="">
        <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2">
            <div>
                <label for="fecha" class="text-fuente">Fecha:</label>
                <input type="datetime-local" class="input-pdv w-full mb-3 text-[20px]" name="fecha" wire:model="fecha" value="{{old('fecha')}}" >
                @error('nombre')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <label for="tratamiento" class="text-fuente">Tratamiento:</label>
                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Tratamiento" name="tratamiento" wire:model="tratamiento" value="{{old('tratamiento')}}" >
                @error('tratamiento')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <label for="nota" class="text-fuente">Notas:</label>
                <textarea name="nota" id="" rows="6" class="input-pdv w-full" wire:model="nota"></textarea>
                @error('nota')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
            </div>
            <div>
                <label for="atendio" class="text-fuente">Atendió:</label> 
                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Atendió" name="atendio" wire:model="atendio" value="{{old('atendio')}}" value="{{$atendio}}" disabled>
                @error('atendio')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <label for="metodo_pago" class="text-fuente">Metodo de pago:</label> 
                <select name="metodo_pago" class="input-pdv w-full mb-3 text-[20px]">
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Efectivo">Efectivo</option>
                </select>
                @error('metodo_pago')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <label for="monto" class="text-fuente">Monto:</label> 
                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="monto" name="monto" wire:model="monto" value="{{old('monto')}}" >
                @error('monto')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
            </div>

        </div>

    </form>
</div>
