<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('pacientes') }}" class="underline text-blue-500">Pacientes</a>
        /
        <a href="{{ route('expediente', ['paciente_id' => $paciente->id]) }}"
            class="underline text-blue-500">{{ $paciente->getFullNombre($paciente->id) }}</a>
        /
        <a href="" class="underline text-blue-500">Historial Clinico</a>
    </div>
    <div class="mx-2 md:mx-[60px] ">

        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">Historial Clinico</p>
                <p class="text-fuente text-[25px]"> {{ $paciente->getFullNombre($paciente->id) }}</p>
                <!--opciones-->
                <button class="btn-primary bg-red-600 mt-[10px]" wire:click="pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                  </svg></button>
                <button class="btn-primary mt-[10px] bg-green-500" wire:click="guardar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"/>
                    <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"/>
                  </svg></button>
            </div>
        </div>

        <div class=" md:flex gap-x-4 mb-10">
            <div class="h-full py-4 bg-white shadow-lg mt-[20px]  rounded-lg mb-2">
                <div class=" p-3 text-gray-700">
                    <h3 class="text-xl font-bold mb-4">¿Padece o ha padecido alguna de las siguientes enfermedades?</h3>
                    <div class="mb-2 md:mx-5">
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
                            <label class="my-2 flex justify-between">
                                Problemas Gastricos
                                <input type="checkbox" wire:model="gastricos" class=" h-4 w-4">
                            </label>
                            <label class="my-2 flex justify-between">
                                Problemas Renales
                                <input type="checkbox" wire:model="renales" class=" h-4 w-4">
                            </label>
                            <label class="my-2 flex justify-between">
                                Artritis
                                <input type="checkbox" wire:model="artritis" class=" h-4 w-4">
                            </label>
                            <label class="my-2 flex justify-between">
                                Epilepsia
                                <input type="checkbox" wire:model="epilepsia" class=" h-4 w-4">
                            </label>
                            <label class="my-2 flex justify-between">
                                C&aacute;ncer
                                <input type="checkbox" wire:model="cancer" class=" h-4 w-4">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-full py-4 bg-white shadow-lg mt-[20px]  rounded-lg mb-2">
                <div class=" p-3 text-gray-700">
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
                            
                            <label class="my-2 flex justify-between">
                                ¿Ha estado bajo atenci&oacute;n medica en los &uacute;ltimos dos años?
                            </label>
                            <select name="atencion_medica" wire:model="atencion_medica" wire:change="aplicar_cambios" id="atencion_medica" class=" rounded-lg text-gray-700 p-2">
                                <option value="0"  selected disabled>--Selecciona una opci&oacute;n--</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                            @if ($atencion_medica == 'SI')
                                <label for="porque_atencion_medica">¿Por qu&eacute; requiri&oacute; atenci&oacute;n medica?</label>
                                <input type="text" id="porque_atencion_medica" wire:model="porque_atencion_medica" name="porque_atencion_medica" class=" rounded-lg text-gray-700 p-2 border border-1 border-gray-600">
                            @endif
                            
                            <label class="my-2 flex justify-between">
                                ¿Toma alg&uacute;n medicamento actualmente?
                            </label>
                            <select name="toma_medicamento" wire:model="toma_medicamento" id="toma_medicamento" class=" rounded-lg text-gray-700 p-2">
                                <option value="0"  selected disabled>--Selecciona una opci&oacute;n--</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>

                            <label class="my-2 flex justify-between">
                                ¿Es al&eacute;rgico a alg&uacute;n medicamento?
                            </label>
                            <select name="es_alergico_medicamento" wire:model="es_alergico_medicamento" wire:change="aplicar_cambios" id="es_alergico_medicamento" class=" rounded-lg text-gray-700 p-2">
                                <option value="0"  selected disabled>--Selecciona una opci&oacute;n--</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                            @if ($es_alergico_medicamento == 'SI')
                                <label for="cual_medicamento_alergico">¿A qu&eacute; medicamento es al&eacute;rgico?</label>
                                <input type="text" id="cual_medicamento_alergico" wire:model="cual_medicamento_alergico" name="cual_medicamento_alergico" class=" rounded-lg text-gray-700 p-2 border border-1 border-gray-600">
                            @endif

                            <label class="my-2 flex justify-between">
                                ¿Es al&eacute;rgico a alg&uacute;n alimento?
                            </label>
                            <select name="es_alergico_alimento" wire:model="es_alergico_alimento" wire:change="aplicar_cambios" id="es_alergico_alimento" class=" rounded-lg text-gray-700 p-2">
                                <option value="0"  selected disabled>--Selecciona una opci&oacute;n--</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                            @if ($es_alergico_alimento == 'SI')
                                <label for="cual_alimento_alergico">¿A qu&eacute; alimento es al&eacute;rgico?</label>
                                <input type="text" id="cual_alimento_alergico" wire:model="cual_alimento_alergico" name="cual_alimento_alergico" class=" rounded-lg text-gray-700 p-2 border border-1 border-gray-600">
                            @endif
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
                })
            });
        </script>
    @endsection
</div>
