<div class="bg-terciario flex overflow-x-auto  shadow-md text-center  items-center justify-center no-scrollbar">
    <!--Boton Para desplegar el menu-->
    <svg xmlns="http://www.w3.org/2000/svg" id="boton-toggle-menu" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor"
        class=" h-[43px] px-4 cursor-pointer active:bg-active bg-principal border border-solid border-principal text-fuente-botones ease-out duration-500 p-1 min-w-[60px] shadow-md"
        onclick="togglemenu()">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
    </svg>


    <a href="{{ route('home') }}">
        <!--Icono-->
        <div
            class=" items-center  text-fuente-botones ml-[10px] bg-lime-500 hover:bg-lime-600 transition ease-in-out rounded-md cursor-pointer shadow-md py-1 px-3 flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-fuente-botones  mr-[10px]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            HOME
        </div>

    </a>


    <!--
        <a href="{{ route('pacientes') }}">
        <div
            class=" items-center  text-fuente-botones ml-[10px] bg-indigo-400 rounded-md cursor-pointer shadow-md py-1 px-3 hidden lg:flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-fuente-botones  mr-[10px]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            PACIENTES
        </div>
    </a>
    -->

<!--
    <a href="{{ route('historial_medico') }}">
        <div
            class=" items-center  text-fuente-botones ml-[10px] bg-amber-500 rounded-md cursor-pointer shadow-md py-1 px-3 hidden lg:flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-fuente-botones  mr-[10px]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
            </svg>
            EXPEDIENTES
        </div>
    </a>
-->

<!--
    <a href="{{ route('citas_index') }}">
        <div
            class=" items-center  text-fuente-botones ml-[10px] bg-teal-500  rounded-md cursor-pointer shadow-md py-1 px-3 hidden lg:flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-fuente-botones  mr-[10px]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
            </svg>
            CITAS
        </div>
    </a>
-->



    <!--NOMBRE DEL SISTEMA-->
    <div class = "w-full text-center  hidden lg:block">
        <p class="text-fuente "></p>
    </div>

    <!--Usuario-->
    <div class=" justify-end flex mr-[20px] items-center w-full">

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class=" mr-[10px] underline text-red-500 hidden md:block hover:text-red-400 ease-out duration-150"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
            </svg>
            </button>
        </form>

        <p class="text-fuente block">

            @if (session()->has('usuario'))
                {{ session('usuario')->nombre }}
            @endif

        </p>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-9 h-9 text-fuente ml-[10px] rounded-md px-1 my-1 block">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
    </div>

</div>
