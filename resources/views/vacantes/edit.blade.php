@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
    @include('ui.navegacion')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Editar oferta {{$vacante->titulo}}</h1>

    <form class="max-w-lg mx-auto my-10" action="{{route('vacantes.update', ['vacante' => $vacante->id])}}" method="POST" novalidate>
        @csrf
        @method('put')

        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">{{ __('Titulo de la Oferta') }}</label>
            <input id="titulo" type="text" class="p-3 bg-white-100 rounded form-input w-full @error('titulo') @enderror" name="titulo" autocomplete="current-titulo" placeholder="Titulo de la oferta" value="{{$vacante->titulo}}">
                @error('titulo')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 text-xs p-4 w-full mt-5" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">{{ __('Categoria de la Oferta') }}</label>
            <select name="categoria" id="categoria" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full">
                <option disabled selected>- Seleccione -</option>
                @foreach($categorias as $categoria)
                    <option {{$vacante->categoria_id == $categoria->id ? 'selected' : ''}} value="{{$categoria->id}}">
                        {{$categoria->nombre}}
                    </option>
                @endforeach
            </select>
            @error('categoria')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 text-xs p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">{{ __('Experiencia Requerida') }}</label>
            <select name="experiencia" id="experiencia" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full">
                <option disabled selected>- Seleccione -</option>
                @foreach($experiencias as $experiencia)
                    <option {{$vacante->experiencia_id == $experiencia->id ? 'selected' : ''}} value="{{$experiencia->id}}">
                        {{$experiencia->nombre}}
                    </option>
                @endforeach
            </select>
            @error('experiencia')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 text-xs p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">{{ __('Ubicacion de la Oferta') }}</label>
            <select name="ubicacion" id="ubicacion" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full">
                <option disabled selected>- Seleccione -</option>
                @foreach($ubicaciones as $ubicacion)
                    <option {{$vacante->ubicacion_id == $ubicacion->id ? 'selected' : ''}} value="{{$ubicacion->id}}">
                        {{$ubicacion->nombre}}
                    </option>
                @endforeach
            </select>
            @error('ubicacion')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 text-xs p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">{{ __('Salario de la Oferta') }}</label>
            <select name="salario" id="salario" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full">
                <option disabled selected>- Seleccione -</option>
                @foreach($salarios as $salario)
                    <option {{$vacante->salario_id == $salario->id ? 'selected' : ''}} value="{{$salario->id}}">
                        {{$salario->nombre}}
                    </option>
                @endforeach
            </select>
            @error('salario')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 text-xs p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">{{ __('Descripción de la Oferta') }}</label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{$vacante->descripcion}}">
            @error('descripcion')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 text-xs p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="skills" class="block text-gray-700 text-sm mb-5">{{ __('Habilidades y conocimientos de la Oferta:')}} <span class="text-xs">(Elige por lo menos 3)</span></label>
            @php
                $skills = [];
                foreach ($habilidades as $habilidad) {
                    array_push($skills, $habilidad->nombre);
                }
            @endphp
            <lista-habilidades 
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{json_encode($vacante->skills)}}"
            >
            </lista-habilidades>
            @error('skills')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 text-xs p-4 w-full mt-5" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="flex flex-wrap ">
            <button type="submit" class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 p-3 focus:outline-none focus:shadow-outline-uppercase font-bold">
                {{ __('Editar Oferta') }}
            </button>
        </div>

    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editor = new MediumEditor('.editable',{
                toolbar:{
                    buttons:[
                        'bold',
                        'italic',
                        'underline',
                        'quote',
                        'anchor',
                        'justifyLeft',
                        'justifyCenter',
                        'justifyRight',
                        'justifyFull',
                        'orderedlist',
                        'unorderedlist',
                        'h2',
                        'h3'
                    ],
                    static: true,
                    sticky: true,
                },
                placeholder:{
                    text: 'Información de la Oferta'
                }
            });

            editor.subscribe('editableInput', function(evevntObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            });

            editor.setContent(document.querySelector('#descripcion').value);
        });
    </script>
@endsection