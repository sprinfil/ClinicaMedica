<div>
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('pacientes') }}" class="underline text-blue-500">Pacientes</a>
        /
         <a href="{{ route('expediente', ['paciente_id' => $paciente->id]) }}" class="underline text-blue-500">{{ $paciente->getFullNombre($paciente->id) }}</a>
        /
        <a href="{{ route('consentimiento', ['paciente_id' => $paciente->id]) }}" class="underline text-blue-500">Consentimiento</a>
    </div>
    <div class="mx-2 md:mx-[60px] mt-[20px]">
        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden border-2 border-color-borde">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px]">Consentimiento <span class="text-fuente font-extrabold">{{ $paciente->getFullNombre($paciente->id) }}</span></p>
            </div>
        </div>
    </div>

    <div class="md:flex sm:block w-full justify-center gap-2 mb-[100px]">
        <div class="sm:w-[90%] md:w-[45%] mt-10 bg-slate-100 p-10 sm:ml-8 sm:h-[90%] md:h-auto overflow-auto">
            <a href="{{ route('verpdf', ['paciente_id' => $paciente->id]) }}" target="_blank" class="text-white text-xl">
                <button class="btn-primary bg-red-500 text-white font-bold mb-5">Ver PDF</button>
            </a>

            @if ($consentimientoPath)
            <iframe src="{{ route('verpdf', ['paciente_id' => $paciente->id]) }}" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
            @else
                <p class=" text-slate-400">Sin contrato de consentimiento</p>
            @endif
        </div>

        <div class="sm:w-[90%] md:w-[45%] mt-10 sm:ml-8">
            <form wire:submit.prevent="saveConsentimiento" class="p-10 bg-white border border-1 border-gray-400">
                <p id="texto">
                    <span class="font-bold">CONSENTIMIENTO INFORMATIVO PARA TRATAMIENTOS DENTALES</span>
                    <br>
                    <br>
                    Yo, <span class="font-bold">{{ $paciente->getFullNombre($paciente->id) }}</span>, en pleno uso de mis facultades mentales, libre y voluntariamente, otorgo mi consentimiento informado a <span class="font-bold">{{ App\Models\Configuracion::first()->nombre_empresa ?? 'SurCodeMedics' }}</span> y a los profesionales de la salud dental que en ella laboran, para realizar los tratamientos dentales que se han considerado necesarios después de haber sido debidamente informado/a.
                    <br>
                    <br>
                    <span class="font-bold">DECLARO QUE:</span>
                    <br>
                    <div class="p-2">
                        <span class="font-bold">1.</span> He sido informado/a de manera clara y comprensible sobre la naturaleza y el propósito de los tratamientos propuestos, incluyendo los procedimientos a realizar, así como de los beneficios esperados de los mismos.
                        <br>
                        <br>
                        <span class="font-bold">2.</span> Se me ha explicado las alternativas disponibles, incluyendo la posibilidad de no realizar tratamiento alguno, y las consecuencias que ello podría conllevar.
                        <br>
                        <br>
                        <span class="font-bold">3.</span> He tenido la oportunidad de preguntar y se me han respondido todas las preguntas que he formulado respecto a los tratamientos, riesgos, complicaciones posibles y medidas preventivas.
                        <br>
                        <br>
                        <span class="font-bold">4.</span> Entiendo que, como en cualquier tratamiento médico o dental, no se pueden garantizar resultados.
                        <br>
                        <br>
                        <span class="font-bold">5.</span> Autorizo la realización de fotografías, radiografías, moldes y cualquier otro estudio necesario para mi diagnóstico y plan de tratamiento, así como su utilización en mi historia clínica dental.
                        <br>
                        <br>
                        <span class="font-bold">6.</span> Comprendo que mi historia clínica será tratada con estricta confidencialidad y solo será accesible al personal autorizado de la clínica, estando protegida bajo las 
                        normativas de secreto profesional y protección de datos personales.
                        <br>
                        <br>
                        <span class="font-bold">7.</span> Se me ha informado que la documentación relativa a mi tratamiento, incluyendo el presente consentimiento, se conservará en los archivos de la clínica dental de acuerdo con las disposiciones legales vigentes.
                    </div>

                    <br>
                    <span class="font-bold">PROCEDO A FIRMAR DIGITALMENTE:</span>
                    Con la firma digital que proporcionaré a continuación, confirmo mi consentimiento informado para que se lleven a cabo los tratamientos dentales recomendados y declaro que he comprendido toda la información que se me ha proporcionado.
                    <br>
                    <br>
                    <span class="font-bold">Fecha:</span> {{ now()->format('d/m/Y') }}
                    <br>
                    <br>
                    <span class="font-bold">Firma del Paciente</span>
                </p>
                
                <canvas id="signaturePad" class="border border-1 border-black w-[300px] h-[200px]"></canvas>
                <br>
                <button type="button" id="saveSig" class="btn-primary font-bold">Firmar y guardar consentimiento</button>
                <button id="clearSig" class="btn-primary font-bold">Limpiar</button>
            </form>
            <p class=" font-extralight mt-2">Nota: Este consentimiento es un compromiso entre el paciente y la clínica dental y no reemplaza ninguna otra forma legal de consentimiento requerido por las leyes locales. Si tiene alguna duda, consulte con su abogado antes de firmar.</p>
        </div>
    </div>

</div>

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var signaturePad = new SignaturePad(document.getElementById('signaturePad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)', // Transparent background
        penColor: 'rgb(0, 0, 0)'
    });

    document.getElementById('clearSig').addEventListener('click', function () {
        signaturePad.clear();
    });

    document.getElementById('saveSig').addEventListener('click', function () {
        if (signaturePad.isEmpty()) {
            return Swal.fire({
                    icon: "error",
                    title: "Firma Necesaria",
                    text: "Es necesario firmar el documento",
                    });
        } else {
            @this.dispatch('saveConsentimiento', signaturePad);
        }
    });

    document.getElementById('saveSig').addEventListener('click', function (e) {
        e.preventDefault(); // Previene el comportamiento por defecto del formulario

        if (signaturePad.isEmpty()) {
            Swal.fire({
                icon: "error",
                title: "Firma Necesaria",
                text: "Es necesario firmar el documento",
            });
            return ;
        }

        var dataURL = signaturePad.toDataURL();

        @this.set('signatureImage', dataURL);
        @this.call('saveConsentimiento');
    });

    window.addEventListener('recargarIframe', event => {
        reloadIframe();
    });

    function reloadIframe() {
        var iframe = document.getElementById('iframe');
        iframe.src = iframe.src.split('?')[0] + '?' + new Date().getTime();
        Swal.fire({
                icon: "success",
                title: "PDF Generado",
                text: "Documento de consentimiento creado con exito",
            });
    }
</script>
@endsection
