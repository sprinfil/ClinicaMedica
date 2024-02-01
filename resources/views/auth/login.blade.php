@extends('layouts.principal')

@section('titulo')
    Login
@endsection

@section('contenido')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full flex justify-center items-center bg-principal rounded-3xl md:w-[800px] py-9 h-[700px] shadow-lg">
            <div class="flex flex-col items-center justify-center w-[70%] ">
                <div>
                        <img  src="storage/images/logo.png" alt="" class="w-[200px]">
                </div>                    
                <div>
                    <h2 class="text-2xl text-fuente-botones font-semibold my-10 mx-2 text-[30px]">BIENVENIDO</h2>
                </div>

                <div class="w-full">
                    <form method="POST" action="{{ route('login') }}" class="flex flex-col items-center justify-center" novalidate>
                        @csrf     
                        
                        @if (session('mensaje'))
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">       
                                {{ session('mensaje') }}
                            </p>
                        @endif
            

                        <!-- INPUT usuario-->
                        <div class="mb-5 w-[100%] ">
                            <input 
                                id="usuario"
                                name="usuario"
                                type="text"
                                placeholder="usuario"
                                class="input-pdv w-[100%] text-[20px]  @error('usuario')
                                border-red-500
                                @enderror"
                                value="{{old('usuario')}}" 
                            />
                            @error('usuario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <!-- INPUT clave-->
                        <div class="mb-5 w-[100%] ">
                            <input 
                                id="password"
                                name="clave"
                                type="password"
                                placeholder="clave"
                                class="input-pdv w-[100%] text-[20px] @error('clave')
                                border-red-500
                                @enderror"
                            />
                            @error('clave')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                            @enderror
                        </div>
            
                        <input 
                            type="submit"
                            value="Ingresar"
                            class=" btn-primary mb-4 w-[100%] mt-[40px] cursor-pointer"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection