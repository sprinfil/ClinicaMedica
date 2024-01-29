<style>
    table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #00a1bd;
            color: #fff;
        }
    .salto-pagina{
        page-break-before: always;
    }

</style>

<div style="margin: 0;  font-family: 'Arial', sans-serif;">

    <h1 style="text-align: center;">Reporte de Historia Clinica</h1>

    <p>La Paz, Baja California Sur, México a {{ now()->format('d-m-Y') }}</p>

    <br>
    
    <h3 style="text-align: center;">HISTORIA CLINICA</h3>

    <table border="1">
        <tbody>
            <tr>
                <th colspan="2" style="text-align: center">INFORMACIÓN PACIENTE</th>
            </tr>
            <tr>
                <td>Nombre Completo</td>
                <td>{{ $paciente->nombre . ' ' . $paciente->apellido_1 . ' ' . $paciente->apellido_2 }}</td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>{{ $paciente->Genero == "" || $paciente->Genero == null ? "sin datos" : $paciente->Genero}}</td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') ?? "sin datos" }}</td>
            </tr>
            <tr>
                <td>Edad</td>
                <td>{{ $paciente->getEdad($paciente->id) == "" || $paciente->getEdad($paciente->id) == null ? "sin datos" : $paciente->getEdad($paciente->id)}}</td>
            </tr>
        </tbody>
    </table>

    {{-- <div class="salto-pagina"></div> --}}
    
    <p>
        ¿Has estado bajo atención medica en los ultimos dos años? <span>{{ ' ' . $historia_clinica->atencion_medica }}</span>
        @if ($historia_clinica->atencion_medica == 'SI')
            <span>
                ¿Porque? {{' ' .  $historia_clinica->porque_atencion_medica }}
            </span> 
        @endif
    </p>

    <p>
        ¿Toma algún medicamento actualmente? <span>{{ ' ' . $historia_clinica->toma_medicamento}}</span>
    </p>

    <p>
        ¿Es alérgico a algún medicamento? <span>{{ ' ' . $historia_clinica->es_alergico_medicamento }}</span>
        @if ($historia_clinica->es_alergico_medicamento == 'SI')
            <span>
                ¿Cuál? {{' ' .  $historia_clinica->cual_medicamento_alergico }}
            </span> 
        @endif
    </p>

    <p>
        ¿Es alérgico a algún alimento? <span>{{ ' ' . $historia_clinica->es_alergico_alimento }}</span>
        @if ($historia_clinica->es_alergico_alimento == 'SI')
            <span>
                ¿Cuál? {{' ' .  $historia_clinica->cual_alimento_alergico }}
            </span> 
        @endif
    </p>

    <p>
        ¿Fuma? {{ ' ' . $historia_clinica->Fuma == 1 ? 'SI' : 'NO' }}
    </p>
    
    <p>
        ¿Toma alcohol regularmente? {{ ' ' . $historia_clinica->Alcohol == 1 ? 'SI' : 'NO' }}
    </p>

    <p>
        ¿Hace ejercicio o alguna actividad fisica? {{ ' ' . $historia_clinica->Ejercicio == 1 ? 'SI' : 'NO' }}
    </p>

    <h3 style="text-align: center;">HISTORIAL MEDICO</h3>

    <p>
        ¿Pacede o ha padecido alguna de estas enfermedades?

        <ul>
            <li>Problemas cardiacos: 
                <span>
                    {{ ' ' . $historia_clinica->Presion == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Problemas gástricos:
                <span>
                    {{ ' ' . $historia_clinica->gastricos == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Problemas renales:
                <span>
                    {{ ' ' . $historia_clinica->renales == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Problemas respiratorios:
                @if ($historia_clinica->asma == 1 || $historia_clinica->neumonia == 1)
                    <span> SI </span>
                    <ul>
                        @if ($historia_clinica->Asma == 1)
                            <li>Asma</li>
                        @endif
                        @if ($historia_clinica->Neumonia == 1)
                            <li>Neumonia</li>
                        @endif
                    </ul>
                @else
                    <span> NO </span>
                @endif
            </li>
            <li>Migraña:
                <span>
                    {{ ' ' . $historia_clinica->Diabetes == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Migraña:
                <span>
                    {{ ' ' . $historia_clinica->Migrana == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Artritis:
                <span>
                    {{ ' ' . $historia_clinica->artritis == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Tuberculosis:
                <span>
                    {{ ' ' . $historia_clinica->Tuberculosis == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Anemia:
                <span>
                    {{ ' ' . $historia_clinica->Anemia == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Epilepsia:
                <span>
                    {{ ' ' . $historia_clinica->epilepsia == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Hepatitis:
                <span>
                    {{ ' ' . $historia_clinica->Hepatitis == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
            <li>Cáncer:
                <span>
                    {{ ' ' . $historia_clinica->cancer == 1 ? 'SI' : 'NO'}}
                </span>
            </li>
        </ul>
    </p>
</div>