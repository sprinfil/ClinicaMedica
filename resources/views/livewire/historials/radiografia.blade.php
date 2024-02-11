<div>
    <style>
        .cursor-zoom-in {
            cursor: zoom-in;
        }
        .cursor-zoom-out {
            cursor: zoom-out;
        }
        .zoomed-in {
            transform: scale(2);
        }
    </style>
    
    @if ($paciente)
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('pacientes') }}" class="underline text-blue-500">Pacientes</a>
        /
        <a href="{{ route('expediente', ['paciente_id' => $paciente->id]) }}"
            class="underline text-blue-500">{{ $paciente->getFullNombre($paciente->id) }}</a>
        /
        <a href="" class="underline text-blue-500">Radiografias</a>
    </div>

        <div class="mx-2 md:mx-[60px] mt-[20px]">
            <div>
                <!--Cabecera-->
                <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
                    <div class="mx-[10px] md:mx-[50px]  justify-between">
                        <p class="text-fuente text-[40px] mb-[20px]">RADIOGRAFIAS</p>
                        <button wire:click="openModal" class="btn-primary">Nueva Radiografía</button>
                    </div>
                </div>
            </div>

            </div>
            <!-- Radiografias Carousel -->
            <div id="radiografiasCarousel2" class="w-[100%] m-auto mt-5 mb-14 flex justify-center items-center flex-col">
                <h2 class=" text-2xl font-extrabold">Radiografias</h2>
                @if (count($radiografias) > 0)
                    @foreach ($radiografias as $index2 => $radiografia)
                        <!-- Cada slide contiene tanto la imagen como la fecha -->
                        <div class="slide2 p-5 border border-1 border-gray-600 rounded-lg shadow-md bg-white flex justify-center h-[70vh] overflow-auto" id="slide2-{{ $index2 }}" style="display: {{ $index2 === 0 ? 'block' : 'none' }};">
                            <p><span class="font-bold">Fecha:</span> {{ $radiografia->fecha }}</p>                           
                            <img 
                                src="{{ asset('storage/' . $radiografia->path) }}"
                                class="object-cover h-[84%] rounded-md cursor-pointer"
                                alt="Radiografía"
                                @click="imageSrc = '{{ asset('storage/' . $radiografia->path) }}'; imageModalOpen = true"   
                            />                        
                            <p><span class="font-bold">Nombre:</span> {{ $radiografia->nombre }}</p>
                            <p><span class="font-bold">Descripción:</span> {{ $radiografia->descripcion }}</p>
                            <button wire:click='eliminar({{ $radiografia->id }})' class="bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>                                  
                            </button>
                        </div>
                    @endforeach
                    <!-- Navegación -->
                    <div class="flex items-center justify-between mt-2">
                        <button onclick="changeSlide2(-1)" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                              </svg>
                        </button>
                        <button onclick="changeSlide2(1)" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                            </svg>

                        </button>
                    </div>
                
                    <div x-show="imageModalOpen" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50" style="display: none;">
                        <div class="flex justify-center items-center w-full h-full">
                            <div class="bg-white p-3 rounded-lg" style="width: 90%; height: 90%; overflow: scroll;">
                                <img :src="imageSrc" class="max-w-full max-h-full cursor-zoom-in" alt="Imagen ampliada" @click="zoomIn($event)" style="transition: transform .2s;">
                                <button @click="imageModalOpen = false" class="absolute top-0 right-0 p-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div x-show="imageModalOpen" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50" style="display: none;">
                        <div class="flex justify-center items-center w-full h-full">
                            <!-- Ajusta el estilo en línea para el tamaño que desees -->
                            <div class="bg-white p-3 rounded-lg overflow-auto" style="width: 90%; height: 90%;">
                                <img :src="imageSrc" class="w-full h-auto" alt="Imagen ampliada">
                                <button @click="imageModalOpen = false" class="absolute top-0 right-0 p-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Sin radiografias</p>
                @endif
            </div>

                        
            <!-- Radiografias Carousel -->
            <div id="radiografiasCarousel" class="w-[100%] m-auto mt-5 mb-14 flex justify-center items-center flex-col">
                <h2 class=" text-2xl font-extrabold">Radiografias de Tratamientos</h2>
                @if (count($radiografiasTratamientos) > 1)
                    @foreach ($radiografiasTratamientos as $tratamientos)
                        @foreach ($tratamientos as $index => $radiografia)
                            @php
                                $tratamiento = $radiografia->getTratamiento($radiografia->tratamiento_id);
                                $fecha = \Carbon\Carbon::parse($tratamiento->fecha);
                            @endphp
                            <!-- Cada slide contiene tanto la imagen como la fecha -->
                            <div class="slide p-5 border border-1 border-gray-600 rounded-lg shadow-md  h-[70vh] bg-white overflow-auto"  id="slide-{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                                <p><span class="font-bold">Fecha:</span> {{ $fecha->format('d/m/Y') }}</p>  
                                <a href="{{ route('historia_odontologica_editar',['paciente_id'=>$paciente->id,'tratamiento_id'=>$tratamiento->id]) }}"><div class="btn-primary mb-[20px] text-center flex items-center justify-center">Abrir tratamiento</div></a>
                                <img src="{{ $radiografia->url }}"class="object-cover w-full h-[100%] rounded-md cursor-pointer h-[84%] "
                                alt="Radiografía"
                                @click="imageSrc = '{{ asset($radiografia->url) }}'; imageModalOpen = true"   >
                            </div>
                        @endforeach
                    @endforeach
                    <!-- Navegación -->
                    <div class="flex items-center justify-between mt-2">
                        <button onclick="changeSlide(-1)" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                            </svg>
                            
                        </button>
                        <button onclick="changeSlide(1)" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                            </svg>

                        </button>
                    </div>
                @else
                    <p>Sin radiografias</p>
                @endif
            
            @if ($modalOpen)
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
            
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <form wire:submit.prevent="saveRadiografia" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                                        Nombre
                                    </label>
                                    <input wire:model="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Nombre de la radiografía">
                                    @error('nombre')
                                        <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                                        Descripción
                                    </label>
                                    <textarea wire:model="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none 
                                    focus:shadow-outline" id="descripcion" placeholder="Descripción"></textarea>
                                    @error('descripcion')
                                        <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="imagen">
                                        Imagen (Radiografía)
                                    </label>
                                    <input wire:model="imagen" type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="imagen">
                                    @error('imagen')
                                        <div class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="flex items-center justify-between">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                        Guardar
                                    </button>
                                    <button wire:click="$set('modalOpen', false)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @else
        'PACIENTE NO ENCONTRADO /404'
    @endif
</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var currentSlide = 0;
    
    const slides = document.querySelectorAll('#radiografiasCarousel .slide'); 
    const totalSlides = slides.length;

    function showSlide(index) {
        if (index < 0 || index >= totalSlides) {
            console.error("Índice fuera de rango. No se puede mostrar el slide:", index);
            return;
        }
        slides.forEach((slide, idx) => {
            slide.style.display = 'none'; 
        });
        slides[index].style.display = 'block'; 
    }

    function changeSlide(direction) {
        currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }
    
    
    showSlide(currentSlide);
    
    var slides2 = document.querySelectorAll('#radiografiasCarousel2 .slide2'); 
    var totalSlides2 = slides2.length;
    var currentSlide2 = 0;

    function showSlide2(index2) {
        if (index2 < 0 || index2 >= totalSlides2) {
            console.error("Índice fuera de rango. No se puede mostrar el slide:", index2);
            return;
        }

        slides2.forEach((slide2, idx) => {
            slide2.style.display = 'none'; 
        });
        slides2[index2].style.display = 'block'; 
    }

    function changeSlide2(direction) {
        currentSlide2 = (currentSlide2 + direction + totalSlides2) % totalSlides2;
        showSlide2(currentSlide2);
    }

    showSlide2(currentSlide2);
        
    window.addEventListener('radiografia_save', event => {
        Swal.fire({
            icon: "success",
            title: "Radiografia Guardada",
            text: "La Radiografia se ha guardado con exito",
        }).then(() => {
            slides2 = document.querySelectorAll('#radiografiasCarousel2 .slide2'); 
            totalSlides2 = slides2.length;
        });
    });

    window.addEventListener('eliminar_advertencia', event => {
        Swal.fire({
            title: "¿Deseas eliminar esta radiografia?",
            text: "La radiografia será eliminada",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                @this.dispatch('eliminar_radiografia')
                Swal.fire({
                    title: "Hecho",
                    text: "Radiografia Eliminada con Exito.",
                    icon: "success"
                }).then(() => {
                    slides2 = document.querySelectorAll('#radiografiasCarousel2 .slide2'); 
                    totalSlides2 = slides2.length;
                });
            }
        });
    });
</script>
<script>
    function zoomIn(event) {
        const imgElement = event.target;
        imgElement.classList.toggle('zoomed-in');
        imgElement.classList.toggle('cursor-zoom-in');
        imgElement.classList.toggle('cursor-zoom-out');
    }
    </script>
@endsection