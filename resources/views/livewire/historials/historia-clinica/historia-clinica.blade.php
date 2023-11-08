<div>
    <div class=" w-full h-full py-4 bg-terciario shadow-lg pb-[40px]">
        <div class="mx-[10px] md:mx-[50px] mt-[2px] text-fuente text-[20px]">
            <a href="{{route('historial_medico')}}" class="underline text-blue-500">Expedientes</a> 
            / 
            <a href="" class="underline text-blue-500">{{$paciente->nombre}}</a>
          </div>
    
        <div class="mx-[10px] md:mx-[50px] mt-[10px]">
            <p class="text-fuente text-[40px]">HISTORIAL CLINICO</p>
        </div>
    </div>

    <div class="h-full py-4 bg-terciario shadow-lg mt-[20px] mx-[20px] rounded-lg ease-out duration-300 overflow-hidden">
        <div class="p-3 text-fuente ">
            <h3 class="text-xl font-bold mb-4">Informaci&oacute;n Personal</h3>
            <div>
                <p>{{ $paciente->nombre }} {{ $paciente->apellido_1 }} {{ $paciente->apellido_2 }}</p>
                <p>Edad: {{ $paciente->getEdad($paciente->id) }}</p>
                <p>Sexo: {{ $paciente->Genero }}</p>
            </div>
        </div>
    </div>

    <div class=" md:flex justify-around mb-10">
        <div class="h-full py-4 bg-terciario shadow-lg mt-[20px] mx-[20px] rounded-lg mb-2">
            <div class=" p-3 text-fuente">
                <div class="mb-2 md:mx-5">
                    <h3 class="text-xl font-bold mb-4">Antecedentes Medicos</h3>
                    <div class=" flex flex-col p-2 w-4/5">
                        <!-- Antecedentes -->
                        <label class="my-2 flex justify-between">
                            Diabetes 
                            <input type="checkbox" wire:model="diabetes" class="h-4 w-4"> 
                        </label>
                        <label class="my-2 flex justify-between">
                            Tuberculosis 
                            <input type="checkbox" wire:model="tuberculosis" class="h-4 w-4"> 
                        </label>
                        <label class="my-2 flex justify-between">
                            Presión alta 
                            <input type="checkbox" wire:model="presion" class=" h-4 w-4">
                        </label>
                        <label class="my-2 flex justify-between">
                            Hepatitis 
                            <input type="checkbox" wire:model="hepatitis" class=" h-4 w-4"> 
                        </label>
                        <label class="my-2 flex justify-between">
                            Anemia 
                            <input type="checkbox" wire:model="anemia" class=" h-4 w-4">
                        </label>
                        <label class="my-2 flex justify-between">
                            Asma 
                            <input type="checkbox" wire:model="asma" class=" h-4 w-4"> 
                        </label>
                        <label class="my-2 flex justify-between">
                            Neumonía 
                            <input type="checkbox" wire:model="neumonia" class=" h-4 w-4"> 
                        </label>
                        <label class="my-2 flex justify-between">
                            Migraña 
                            <input type="checkbox" wire:model="migrana" class=" h-4 w-4"> 
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-full py-4 bg-terciario shadow-lg mt-[20px] mx-[20px] rounded-lg mb-2">
            <div class=" p-3 text-fuente">       
                <div class="mb-2 md:mx-5">
                    <h3 class="text-xl font-bold mb-4">Informaci&oacute;n Sobre Salud en General</h3>
                    <div class=" flex flex-col p-2 w-4/5">
                        <!-- Salud general -->
                        <label class="my-2 flex justify-between">
                            ¿Fuma? 
                            <input type="checkbox" wire:model="fuma" class=" h-4 w-4"> 
                        </label>
                        <label class="my-2 flex justify-between">
                            ¿Toma alcohol regularmente? 
                            <input type="checkbox" wire:model="alcohol" class=" h-4 w-4"> 
                        </label>
                        <label class="my-2 flex justify-between">
                            ¿Hace ejercicio o actividad fisica? 
                            <input type="checkbox" wire:model="ejercicio" class=" h-4 w-4">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="h-full py-4 bg-terciario shadow-lg mt-[20px] mx-[20px] rounded-lg mb-2">
            <div class=" p-3 text-fuente">       
                <div class="mb-2 md:mx-5">
                    <h3 class="text-xl font-bold mb-4">Opciones</h3>
                    <div class=" flex flex-col p-2 w-4/5 mx-5">
                        <button class="btn-primary mt-[10px]" wire:click="pdf">Exportar PDF</button>
                        <button class="btn-primary mt-[10px] bg-green-500" wire:click="guardar">Guardar</button>
                        <button class="btn-primary mt-[10px] bg-red-500" wire:click="volver">Volver</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('success', event => {
            Swal.fire({
                position: 'center-middle',
                icon: 'success',
                title: 'Historial Guardado',
                showConfirmButton: false,
                text: 'El historial clinico se ha guardado con exito',
                timer: 1500,   
                }
            )
        });

    </script>
@endsection