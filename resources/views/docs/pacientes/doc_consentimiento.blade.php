<style>
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 13px;
    }

    .titulo{
        text-align: center;
    }

    .contenedor-header {
        width: 100%;
        height: 120px;
        text-align: center;
    }

    .contenedor-header img {
        width: 100px;
    }


    .firma-imagen {
        height: 100px; /* Ajusta esta altura según sea necesario para tus imágenes */
    }

    .firma-texto {
        text-align: center;
        margin-top: 10px;
    }
</style>

<!--HEADER-->
<div class="contenedor-header">
    <img src="{{ public_path() . '/storage/images/logo.png'}}" alt="">
    <h1>{{ App\Models\Configuracion::first()->nombre_empresa ?? 'SurCodeMedics' }}</h1>
</div>
<hr>
<!--CONTENIDO-->
<div class="contendor-contenido">

    <p id="texto" wire:model='texto_consentimiento'>
        <span class="font-bold"><b>CONSENTIMIENTO INFORMATIVO PARA TRATAMIENTOS DENTALES</b></b></span>
        <br>
        <br>
        Yo, <span class="font-bold"><b>{{ $paciente->getFullNombre($paciente->id) }}</b></span>, en pleno uso de mis facultades mentales, libre y voluntariamente, otorgo mi consentimiento informado a <span class="font-bold"><b>{{ App\Models\Configuracion::first()->nombre_empresa ?? 'SurCodeMedics' }}</b></span> y a los profesionales de la salud dental que en ella laboran, para realizar los tratamientos dentales que se han considerado necesarios después de haber sido debidamente informado/a.
        <br>
        <br>
        <span class="font-bold"><b>DECLARO QUE:</b></span>
        <br>
        <div class="p-2">
            <span class="font-bold"><b>1.</b></span> He sido informado/a de manera clara y comprensible sobre la naturaleza y el propósito de los tratamientos propuestos, incluyendo los procedimientos a realizar, así como de los beneficios esperados de los mismos.
            <br>
            <br>
            <span class="font-bold"><b>2.</b></span> Se me ha explicado las alternativas disponibles, incluyendo la posibilidad de no realizar tratamiento alguno, y las consecuencias que ello podría conllevar.
            <br>
            <br>
            <span class="font-bold"><b>3.</b></span> He tenido la oportunidad de preguntar y se me han respondido todas las preguntas que he formulado respecto a los tratamientos, riesgos, complicaciones posibles y medidas preventivas.
            <br>
            <br>
            <span class="font-bold"><b>4.</b></span> Entiendo que, como en cualquier tratamiento médico o dental, no se pueden garantizar resultados.
            <br>
            <br>
            <span class="font-bold"><b>5.</b></span> Autorizo la realización de fotografías, radiografías, moldes y cualquier otro estudio necesario para mi diagnóstico y plan de tratamiento, así como su utilización en mi historia clínica dental.
            <br>
            <br>
            <span class="font-bold"><b>6.</b></span> Comprendo que mi historia clínica será tratada con estricta confidencialidad y solo será accesible al personal autorizado de la clínica, estando protegida bajo las 
            normativas de secreto profesional y protección de datos personales.
            <br>
            <br>
            <span class="font-bold"><b>7.</b></span> Se me ha informado que la documentación relativa a mi tratamiento, incluyendo el presente consentimiento, se conservará en los archivos de la clínica dental de acuerdo con las disposiciones legales vigentes.
        </div>
        <br>
        <br>
        <span class="font-bold"><b>Fecha:</b></span> {{ now()->format('d/m/Y') }}
        <br>
        <br>
    </p>
        <!-- FIRMA -->
        <table width="100%" class="mt-10">
            <tr>
                <!-- Firma del Paciente -->
                <td class="firma-texto">
                    <img src="{{ public_path() . '/storage/' . $firma }}" class="firma-imagen" alt="Firma del Paciente">
                    <div>Firma del Paciente</div>
                </td>
                <!-- Firma de SurCodeMedics o Representante Legal -->
                <td class="firma-texto">
                    <img src="{{ public_path() . '/storage/firmas/firma.png'}}" class="firma-imagen" alt="Firma de SurCodeMedics">
                    <div>Firma de {{ App\Models\Configuracion::first()->nombre_empresa ?? 'SurCodeMedics' }} o Representante Legal</div>
                </td>
            </tr>
        </table>
    <!--FIN-->
</div>

