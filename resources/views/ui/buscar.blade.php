<h2 class="my-10 text-2xl text-gray-700" >Busca una oferta</h2>
<form action="{{route('vacantes.buscar')}}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2">{{ __('Categoria de la Oferta') }}</label>
        <select name="categoria" id="categoria" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full">
            <option disabled selected>- Seleccione -</option>
            @foreach($categorias as $categoria)
                <option {{old('categoria') == $categoria->id ? 'selected' : ''}} value="{{$categoria->id}}">
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
        <label for="ubicacion" class="block text-gray-700 text-sm mb-2">{{ __('Ubicacion de la Oferta') }}</label>
        <select name="ubicacion" id="ubicacion" class="block appearance-none border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full">
            <option disabled selected>- Seleccione -</option>
            @foreach($ubicaciones as $ubicacion)
                <option {{old('ubicacion') == $ubicacion->id ? 'selected' : ''}} value="{{$ubicacion->id}}">
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

    <button type="submit" class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10">
        BBuscar Ofertas
    </button>
</form>