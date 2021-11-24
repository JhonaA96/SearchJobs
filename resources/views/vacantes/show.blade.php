@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>
    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="block text-gray-700 font-bold my-2">
                publicado: <span class="font-normal"> {{$vacante->created_at->diffForHumans()}}
                Por: <span class="font-normal"> {{$vacante->reclutador->name}}
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Categoría: <span class="font-normal"> {{$vacante->categoria->nombre}}
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Salario: <span class="font-normal"> {{$vacante->salario->nombre}} USD
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Ubicacion: <span class="font-normal"> {{$vacante->ubicacion->nombre}} USD
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal"> {{$vacante->experiencia->nombre}} USD
            </p>
            <h2 class="text-2xl text-center mb-5 text-gray-700">Habilidades requeridas: </h2>
            @php
                $arraySkills = explode(',', $vacante->skills);
            @endphp
            @foreach($arraySkills as $skill)
                <p class="inline-block border border-gray-500 rounded py-2 px-8 text-gray-700 font-bold my-2 ">
                    {{$skill}}
                </p>
            @endforeach

            <div class="descripcion mt-10 mb-5">
                {!!$vacante->descripcion!!}
            </div>
        </div>
        @include('ui.contacto')
    </div>
@endsection