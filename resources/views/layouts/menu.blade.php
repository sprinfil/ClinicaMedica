<!--Seccion menu-->
<nav class="close-nav text-gray-300 min-[1180px]:w-[250px] w-screen ease-out duration-500 bg-negro-menu h-screen shadow-lg"
    id="menu">
    <div class="px-3"> <!--seccion superior-->
        <div class="flex justify-between h-full pt-3">
            <div class="">
                <!--Texto Superior-->
                <p class="texto ocultar-texto text-[20px] text-fuente">MENU</p>
                @if (session()->has('usuario'))
                    <p class="text-[17px] texto mt-2 ocultar-texto md:hidden block">{{ session('usuario')->nombre }} -
                        {{ session('usuario')->Tipo }}</p>
                @endif
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" id="boton-toggle-menu" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor"
                    class="w-9 h-auto px-3 cursor-pointer active:bg-active bg-principal border border-solid border-principal text-fuente-botones ease-out duration-500 p-1 min-w-[60px] shadow-md ocultar-boton-responsive"
                    onclick="togglemenu()">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>
            </div>

        </div>
        <br>
        <hr class="bg-fuente h-[1px]">


        <div class="overflow-auto no-scrollbar pt-3 mt-2" id="contenedor-botones"> <!--div contenedor-->
            <div class="mt-10"> <!--seccion botones-->
                <ul class="mt-6 relative">

                    <!--///////Home//////-->
                    <a href="{{ route('home') }}">
                        <div class=" my-1 p-3 rounded-md flex cursor-pointer active:bg-active bg-principal ease-out duration-500 h-[65px]"
                            onclick="toggleSubMenu('ventas')">
                            <!--Icono-->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-fuente-botones">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <!--Texto-->
                            <li
                                class="text-center font-400 ml-[30px] texto ocultar-texto text-[20px] h-[30px] mt-[5px] text-fuente-botones">
                                <span>Home</span>
                            </li>
                        </div>
                    </a>



                    <!--///////Pacientes//////-->
                    <div class=" my-1 p-3 rounded-md flex cursor-pointer active:bg-active bg-principal ease-out duration-500 h-[65px]"
                        onclick="toggleSubMenu('Pacientes')">
                        <!--Icono-->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-9 h-9 text-fuente-botones">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <!--Texto-->
                        <li
                            class="text-center font-400 ml-[30px] texto ocultar-texto text-[20px] h-[30px] mt-[5px] text-fuente-botones">
                            <span>Pacientes</span>
                        </li>
                    </div>
                    <!--///////LIsta//////-->
                    <div class="submenu my-3 ease-out duration-500 ocultar" id="Pacientes">
                        <ul class="">
                            <a href="{{ route('pacientes') }}">
                                <div
                                    class="hover:bg-principal active:bg-active hover:text-fuente-botones ease-out duration-500 rounded-sm py-2">
                                    <li class="texto ocultar-texto ml-[10px]"><span>Pacientes</span></li>
                                </div>
                            </a>
                            <a href="{{ route('historial_medico') }}">
                                <div
                                    class="hover:bg-principal active:bg-active hover:text-fuente-botones ease-out duration-500 rounded-sm py-2">
                                    <li class="texto ocultar-texto ml-[10px]"><span>Expedientes</span></li>
                                </div>
                            </a>
                        </ul>
                    </div>

                    <!--///////CITAS//////-->
                    <a href={{ route('citas_index') }}>
                        <div class=" my-1 p-3 rounded-md flex cursor-pointer active:bg-active bg-principal ease-out duration-500 h-[65px]"
                            onclick="">
                            <!--Icono-->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-fuente-botones">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>


                            <!--Texto-->
                            <li
                                class="text-center font-400 ml-[30px] texto ocultar-texto text-[20px] h-[30px] mt-[5px] text-fuente-botones">
                                <span>Citas</span>
                            </li>
                        </div>
                    </a>

                    <!--///////REPORTES//////-->
                    <div class=" my-1 p-3 rounded-md flex cursor-pointer active:bg-active bg-principal ease-out duration-500 h-[65px]"
                        onclick="toggleSubMenu('Reportes')">
                        <!--Icono-->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-9 h-9 text-fuente-botones">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                        </svg>


                        <!--Texto-->
                        <li
                            class="text-center font-400 ml-[30px] texto ocultar-texto text-[20px] h-[30px] mt-[5px] text-fuente-botones">
                            <span>Reportes</span>
                        </li>
                    </div>
                    <!--///////LIsta//////-->
                    <div class="submenu my-3 ease-out duration-500 ocultar" id="Reportes">
                        <ul class="">
                            <a href="{{ route('corte_caja') }}">
                                <div
                                    class="hover:bg-principal active:bg-active hover:text-fuente-botones ease-out duration-500 rounded-sm py-2">
                                    <li class="texto ocultar-texto ml-[10px]"><span>Corte de caja</span></li>
                                </div>
                            </a>
                        </ul>
                    </div>

                    <!--ADMIN-->
                    <!--///////Usuarios//////-->
                    @if (session()->has('usuario') && session('usuario')->Tipo === 'Admin')
                        <!--///////Boton//////-->
                        <a href="{{ route('usuarios') }}">
                            <div class=" my-1 p-3 rounded-md flex cursor-pointer active:bg-active bg-principal ease-out duration-500 h-[65px]"
                                onclick="toggleSubMenu('ventas')">
                                <!--Icono-->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-fuente-botones">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                <!--Texto-->
                                <li
                                    class="text-center font-400 ml-[30px] texto ocultar-texto text-[20px] h-[30px] mt-[5px] text-fuente-botones">
                                    <span>Usuarios</span>
                                </li>
                            </div>
                        </a>
                    @endif

                    <!--TERMINA ADMIN-->


                    <!--///////Cerrar Sesion//////-->


                    <!--///////Boton//////-->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full mt-9 p-3 rounded-md flex cursor-pointer active:bg-active bg-rojo ease-out duration-500 h-[65px]">
                            <!-- Icono -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-fuente">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            <!-- Texto -->
                            <li
                                class="text-center font-400 ml-[30px] texto ocultar-texto text-[20px] h-[30px] mt-[5px] text-fuente">
                                <span>Salir</span>
                            </li>
                        </button>
                    </form>



                    <!--Fin de lista-->


                    <!--Logo SurCode-->
                    <div class="w-full h-[80px]">
                        <div class="w-full absolute bottom-0 flex items-end justify-center">
                            <div>
                                <div class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                    </svg>
                                </div>
                                <p class="text-fuente">Surcode®</p>
                            </div>


                </ul>

            </div>



        </div>

    </div>

</nav>
