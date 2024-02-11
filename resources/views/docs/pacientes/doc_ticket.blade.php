<style>
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 15px;
    }

    .titulo{
        text-align: center;
    }

    h1 + p {
            margin-top: 0;
        }

    .contenedor-header {
        width: 100%;
        height: 120px;
        text-align: center;
    }

    .contenedor-header img {
        width: 100px;
    }
    .contenedor-total{
        text-align: right;
        font-size: 30px;
        margin: 0px;
        padding: 0px;
    }
    .contenedor-total h1{
        font-size: 17px;
    }
    .contenedor-total p{
        font-size: 17px;
    }


    table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        td{
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #286C68;
            color: white;
            padding: 10px 0px 10px 0px;
        }


</style>

<!--HEADER-->
<div class="contenedor-header">
    <img src="{{ public_path() . '/storage/images/logo.png' }}" alt="">
    <h1>{{ App\Models\Configuracion::first()->nombre_empresa }}</h1>
</div>
<hr>
<!--CONTENIDO-->
<div class="contendor-contenido">
    <h1>
        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tratamiento->fecha)->format('d') }}
        de
        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tratamiento->fecha)->monthName }}
        del
        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tratamiento->fecha)->format('Y') }}
    </h1>
    <h1 class="titulo">Paciente</h1>
    <table>
        <tbody>
            <tr>
                <td>Nombre</td>
                <td>{{ $paciente->getFullNombre($paciente->id) }}</td>
            </tr>
            <tr>
                <td>Cel</td>
                <td>{{ $paciente->numero}}</td>
            </tr>
        </tbody>
    </table>

    <h1 class="titulo" style="margin-top: 40px;">Medico</h1>
    <table>
        <tbody>
            <tr>
                <td>Nombre</td>
                <td>{{ $tratamiento->atendio->getNombreCompleto() }}</td>
            </tr>
            <tr>
                <td>Correo</td>
                <td>{{ $tratamiento->atendio->correo }}</td>
            </tr>
            <tr>
                <td>Celular</td>
                <td>{{ $tratamiento->atendio->celular }}</td>
            </tr>
        </tbody>
    </table>

 
    <table style="margin-top: 40px;">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
            <tr>
                <td style="text-align: center;">{{ $detalle->servicio->nombre}}</td>
                <td style="text-align: center;">{{ $detalle->cantidad}}</td>
                <td style="text-align: center;">$ {{  number_format($detalle->servicio->precio,2)}}</td>
                <td style="text-align: center;">$ {{ number_format($detalle->cantidad * $detalle->servicio->precio,2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="contenedor-total">
        <p>SUBTOTAL: $ {{  number_format($tratamiento->monto, 2)}}</p>
        @if($tratamiento->metodo_pago == "DOLAR")
        <p>I.V.A: $ {{ number_format($tratamiento->impuesto / App\Models\Configuracion::first()->dolar, 2) }}</p>
        <h1>TOTAL: $ {{  number_format(  (($tratamiento->impuesto / App\Models\Configuracion::first()->dolar) + $tratamiento->monto), 2)}}</h1>
        @else
        <p>I.V.A: $ {{ number_format($tratamiento->impuesto, 2) }}</p>
        <h1>TOTAL: $ {{  number_format(  ($tratamiento->impuesto + $tratamiento->monto), 2)}}</h1>
        @endif

        @if($tratamiento->metodo_pago == "EFECTIVO")
        <p>PAGO CON: MXN $ {{ number_format($tratamiento->pago_con_mxn,2)  }}</p>
        <h1>CAMBIO: $ {{ number_format(($tratamiento->pago_con_mxn  - ($tratamiento->impuesto + $tratamiento->monto)),2) }}</h1>
        @endif
        @if($tratamiento->metodo_pago == "TARJETA DEBITO")
        <p>PAGO CON: TARJETA DEBITO</p>
        <p>REFERENCIA: {{ $tratamiento->referencia_pago_tarjeta_debito }}</p>
        @endif
        @if($tratamiento->metodo_pago == "TARJETA CREDITO")
        <p>PAGO CON: TARJETA CREDITO</p>
        <p>REFERENCIA: {{ $tratamiento->referencia_pago_tarjeta_credito }}</p>
        @endif
        @if($tratamiento->metodo_pago == "DOLAR")
        <p>PAGO CON:  USD ${{number_format($tratamiento->pago_con_usd,2)  }}</p>
        <h1>CAMBIO MXN: ${{number_format($tratamiento->pago_con_usd * App\Models\Configuracion::first()->dolar - ((($tratamiento->impuesto / App\Models\Configuracion::first()->dolar) + $tratamiento->monto) * App\Models\Configuracion::first()->dolar) ,2) }}</h1>
        <h1>CAMBIO USD: ${{ number_format($tratamiento->pago_con_usd - ((($tratamiento->impuesto / App\Models\Configuracion::first()->dolar) + $tratamiento->monto)),2)  }}</h1>
        @endif
    </div>

    <!--FIN-->
</div>

