<div>

    <div class="mx-[10px] md:mx-[50px] mt-[2px] text-fuente text-[20px]">
        <a href="{{route('historial_medico')}}" class="underline text-blue-500">Historial Médico</a> 
        / 
        <a href="" class="underline text-blue-500">{{$paciente->nombre}}</a>
      </div>

    <div class="px-[10px] md:px-[50px] py-5 flex justify-between mt-[10px] z-[5] ">
        <p class="text-fuente text-[40px]">Historia Odontológica</p>
    </div>
    <div class="mx-[10px] md:mx-[50px] flex justify-between mt-[10px]">
        <p class="text-fuente text-[30px]">Informacion Personal</p>
    </div>

    <table class="table-auto mx-[10px] md:mx-[50px] text-fuente">
        <tbody>
            <tr> 
                <td class="p-2 font-bold">Nombre: </td>
                <td class="p-2">{{$paciente->getFullNombre($paciente->id)}}</td>
                <td class="p-2 font-bold">Edad: </td>
                <td class="p-2">{{$edad}}</td>
            </tr>
            <tr>
                <td class="p-2 font-bold">Correo:</td>
                <td class="p-2">{{$paciente->correo}}</td>
                <td class="p-2 font-bold">Genero: </td>
                <td class="p-2">{{$paciente->Genero}}</td>
            </tr>
            <tr>
                <td class="p-2 font-bold">Número:</td>
                <td class="p-2">{{$paciente->numero}}</td>
            </tr>
        </tbody>
    </table>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg md:mx-[50px] my-[25px]">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                        Tratamiento
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Atendió
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Notas
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Monto
                    </th>
                    <th scope="col" class="px-6 py-3" >
                        Metodo de pago
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($tratamientos as $tratamiento)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span>{{$tratamiento->tratamiento}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{\Carbon\Carbon::parse($tratamiento->fecha)->format('d/m/Y h:i A')}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$tratamiento->atendio->nombre}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$tratamiento->notas}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >$ {{$tratamiento->monto}}</span>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="casilla">
                        <span >{{$tratamiento->metodo_pago}}</span>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
    </div>
