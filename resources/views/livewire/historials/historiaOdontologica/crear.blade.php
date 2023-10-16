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

    <form action="{{route('historia_odontologica_store', ['paciente_id' => $paciente->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" px-7 py-7 gap-x-20 grid grid-cols-1 md:grid-cols-2">
            <div>
                <p class="text-fuente">Fecha:</p>
                <input type="datetime-local" class="input-pdv w-full mb-3 text-[20px]" name="fecha" value="{{old('fecha')}}" >
                @error('fecha')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <p class="text-fuente">Tratamiento:</p>
                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Tratamiento" name="tratamiento" value="{{old('tratamiento')}}" >
                @error('tratamiento')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <p class="text-fuente">Notas:</p>
                <textarea name="nota" id="" rows="6" class="input-pdv w-full"></textarea>
                @error('nota')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
            </div>
            <div>
                <p class="text-fuente">Atendio:</p>
                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="Atendió" name="atendio" wire:model="atendio" value="{{$atendio}}">
                @error('atendio')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <p class="text-fuente">Metodo de pago:</p>
                <select name="metodo_pago" class="input-pdv w-full mb-3 text-[20px]">
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Efectivo">Efectivo</option>
                </select>
                @error('metodo_pago')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <p class="text-fuente">Monto:</p>
                <input type="text" class="input-pdv w-full mb-3 text-[20px]" placeholder="monto" name="monto" value="{{old('monto')}}" >
                @error('monto')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror
                
            
                <p class="text-fuente">Foto Clinica:</p>
                <input type="file" name="clinica" class="input-pdv  w-full" accept="image/*">
                @error('clinica')<div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </div>@enderror

                <button class="btn-primary mt-[20px] ml-[30px]" type="submit">Aceptar</button>

            </div>
    
        </div>

    </form>

    <form action="/file-upload"
    class="dropzone mx-[30px]"
    id="my-awesome-dropzone"></form>


</div>
