<!--Seccion menu-->
<nav class="close-nav text-gray-300 w-[250px] ease-out duration-500 bg-negro-menu h-screen" id="menu" >
    <div class="container px-3">   <!--seccion superior-->
        <div class="flex justify-between h-full pt-3 ">
            <div class="">
                       <!--Texto Superior-->
                 <p class="text-base font-bold texto ocultar-texto text-[30px]">MENU</p>
                 <p class="text-[17px] font-bold texto mt-2 ocultar-texto">Historial Clinico</p>
                 @if (session()->has('usuario'))
                 <p class="text-[17px] texto mt-2 ocultar-texto">{{session('usuario')->nombre}} - {{session('usuario')->Tipo}}</p>
              
                 @endif
           </div>
  
       </div>
       <br>
      <hr class="bg-">
  
  
    <div class="overflow-auto no-scrollbar pt-3 mt-2" id="contenedor-botones">         <!--div contenedor-->
      <div class="mt-10"> <!--seccion botones-->
          <ul class="mt-6">
  


            <!--ADMIN-->
                          <!--///////Usuarios//////-->
                  @if (session()->has('usuario') && session('usuario')->Tipo === 'Admin')
                    <!--///////Boton//////-->
                    <a href="usuarios">
                      <div class=" my-1 p-3 rounded-md flex cursor-pointer active:bg-active bg-principal ease-out duration-500 h-[65px]" onclick="toggleSubMenu('ventas')">
                          <!--Icono-->
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-fuente-botones">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>    
                          <!--Texto-->
                    <li class="text-center font-400 ml-[30px] texto ocultar-texto text-[20px] h-[30px] mt-[5px] text-fuente-botones"><span>Usuarios</span></li>
                      </div>  
                    </a>
                  @endif

            <!--TERMINA ADMIN-->
 
  
                  <!--///////Cerrar Sesion//////-->

          
          <!--///////Boton//////-->
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full mt-9 p-3 rounded-md flex cursor-pointer active:bg-active bg-rojo ease-out duration-500 h-[65px]">
                <!-- Icono -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-fuente-botones">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                <!-- Texto -->
                <li class="text-center font-400 ml-[30px] texto ocultar-texto text-[20px] h-[30px] mt-[5px] text-fuente-botones">
                    <span>Salir</span>
                </li>
            </button>
        </form>
        

     </div>   
      <!--Fin de lista-->
      </ul>
    </div>
  </nav>
  