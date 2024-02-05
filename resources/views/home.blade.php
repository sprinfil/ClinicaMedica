@extends('layouts.principal')

@section('titulo')
    Home
@endsection

@section('contenido')
    <!--navegacion superior-->
    <div class=" text-fuente text-[15px] shadow-lg bg-negro-fondo  px-5 py-2 border-b border-fuente mx-0 mb-[20px]">
        <a href="{{ route('home') }}" class="underline text-blue-500">Home</a>
    </div>
    <div class="mx-2 md:mx-[60px] mt-[20px] mb-[100px]">
        <!--Cabecera-->
        <div class=" w-full h-full py-4 bg-terciario shadow-lg rounded-md overflow-x-hidden">
            <div class="mx-[10px] md:mx-[50px]  justify-between">
                <p class="text-fuente text-[40px] mb-[20px]">HOME</p>
            </div>
        </div>

        <div class="mt-[25px] grid md:grid-cols-4 grid-cols-1 gap-4">
            <!--CITAS-->
            <a href="{{ route('citas_index') }}">
                <div
                    class="w-full h-[140px] transition ease-in-out bg-teal-500  hover:bg-teal-600  shadow-lg rounded-md overflow-x-hidden grid grid-rows-2 justify-center items-center cursor-pointer  px-4">
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="white" class="w-[90px] text-fuente-botones mt-[20px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                    </div>

                    <div class="text-center">
                        <p class="text-fuente-botones text-[20px] mt-[20px]">Citas</p>
                    </div>
                </div>
            </a>

            <!--PACIENTES-->
            <a href="{{ route('pacientes') }}">
                <div
                    class="w-full h-[140px] transition ease-in-out bg-indigo-400 hover:bg-indigo-500 shadow-lg rounded-md overflow-x-hidden grid grid-rows-2 justify-center items-center cursor-pointer  px-4">
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="white" class="w-[90px] text-fuente-botones mt-[20px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>

                    <div class="text-center">
                        <p class="text-fuente-botones text-[20px] mt-[20px]">Pacientes</p>
                    </div>
                </div>
            </a>

            <!--SERVICIOS-->
            @if (session()->has('usuario') && session('usuario')->Tipo === 'Admin')
            <a href="{{ route('servicios.index') }}">
                <div
                    class="w-full h-[140px] transition ease-in-out bg-blue-400 hover:bg-blue-500 shadow-lg rounded-md overflow-x-hidden grid grid-rows-2 justify-center items-center cursor-pointer  px-4">
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-[90px] text-fuente-botones mt-[20px] ml-[20px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                          </svg>                          
                    </div>

                    <div class="text-center">
                        <p class="text-fuente-botones text-[20px] mt-[20px]">Servicios</p>
                    </div>
                </div>
            </a>
            @endif

            <!--PACIENTES-->
            <a href="{{ route('corte_caja') }}">
                <div
                    class="w-full h-[140px] transition ease-in-out bg-orange-500 hover:bg-orange-600 shadow-lg rounded-md overflow-x-hidden grid grid-rows-2 justify-center items-center cursor-pointer  px-4">
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="white" class="w-[90px] text-fuente-botones mt-[20px] ml-[20px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m7.848 8.25 1.536.887M7.848 8.25a3 3 0 1 1-5.196-3 3 3 0 0 1 5.196 3Zm1.536.887a2.165 2.165 0 0 1 1.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 1 1-5.196 3 3 3 0 0 1 5.196-3Zm1.536-.887a2.165 2.165 0 0 0 1.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863 2.077-1.199m0-3.328a4.323 4.323 0 0 1 2.068-1.379l5.325-1.628a4.5 4.5 0 0 1 2.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.33 4.33 0 0 0 10.607 12m3.736 0 7.794 4.5-.802.215a4.5 4.5 0 0 1-2.48-.043l-5.326-1.629a4.324 4.324 0 0 1-2.068-1.379M14.343 12l-2.882 1.664" />
                        </svg>
                    </div>

                    <div class="text-center">
                        <p class="text-fuente-botones text-[20px] mt-[20px]">Corte de caja</p>
                    </div>
                </div>
            </a>

            <!--USUARIOS-->
            @if (session()->has('usuario') && session('usuario')->Tipo === 'Admin')
                <a href="{{ route('usuarios') }}">
                    <div
                        class="w-full h-[140px] transition ease-in-out bg-yellow-500 hover:bg-yellow-600 shadow-lg rounded-md overflow-x-hidden grid grid-rows-2 justify-center items-center cursor-pointer  px-4">
                        <div class="mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="white" class="w-[90px] text-fuente-botones mt-[20px]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>

                        <div class="text-center">
                            <p class="text-fuente-botones text-[20px] mt-[20px]">Usuarios</p>
                        </div>
                    </div>
                </a>
            @endif

            <!--Ajustes-->
            @if (session()->has('usuario') && session('usuario')->Tipo === 'Admin')
                <a href="{{ route('configuracion') }}">
                    <div
                        class="w-full h-[140px] transition ease-in-out bg-emerald-500 hover:bg-emerald-600 shadow-lg rounded-md overflow-x-hidden grid grid-rows-2 justify-center items-center cursor-pointer  px-4">
                        <div class="mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="white" class="w-[90px] text-fuente-botones mt-[20px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        </div>

                        <div class="text-center">
                            <p class="text-fuente-botones text-[20px] mt-[20px]">Ajustes</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    @endsection
