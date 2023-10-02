@extends('layouts.principal')

@section('titulo')
    Login
@endsection

@section('contenido')
    <div class="flex justify-center items-center h-screen">
        <div class="w-[30%] flex justify-center items-center bg-white bg-opacity-20 rounded-3xl">
            <div class="flex flex-col items-center justify-center">
                <div>
                        <img src="" alt="">
                </div>
                <div>
                    <h2 class="text-2xl text-white font-semibold my-3 mx-2">Bienvenido</h2>
                </div>

                <div class="">
                    <form method="POST" action="{{ route('login') }}" class="flex flex-col items-center justify-center" novalidate>
                        @csrf     
                        
                        @if (session('mensaje'))
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">       
                                {{ session('mensaje') }}
                            </p>
                        @endif
            
                        <!-- INPUT usuario-->
                        <div class="mb-5">
                            <input 
                                id="usuario"
                                name="usuario"
                                type="text"
                                placeholder="usuario"
                                class="input-pdv @error('usuario')
                                border-red-500
                                @enderror"
                                value="{{old('usuario')}}" 
                            />
                            @error('usuario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <!-- INPUT clave-->
                        <div class="mb-5">
                            <input 
                                id="password"
                                name="clave"
                                type="password"
                                placeholder="clave"
                                class="input-pdv @error('clave')
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
                            class=" btn-primary mb-4"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection