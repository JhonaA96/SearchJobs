<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Experiencia;
use App\Models\Salario;
use App\Models\Ubicacion;
use App\Models\Habilidades;
use Illuminate\Http\Request;

class VacanteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->simplePaginate(5);
        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        $habilidades = Habilidades::all();


        return view('vacantes.create')
            ->with('categorias', $categorias)
            ->with('experiencias', $experiencias)
            ->with('ubicaciones', $ubicaciones)
            ->with('salarios', $salarios)
            ->with('habilidades', $habilidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|min:8',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:100',
            'skills' => 'required',
        ]);

        auth()->user()->vacantes()->create([
            'titulo' => $data['titulo'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
            'descripcion' => $data['descripcion'],
            'skills' => $data['skills'],
        ]);

        return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show')->with('vacante', $vacante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        //
    }

    public function estado(Request $request, Vacante $vacante){
        $vacante->activa = $$request->estado;
        $vacante->save();
        return response()->json($vacante);
    }
}
