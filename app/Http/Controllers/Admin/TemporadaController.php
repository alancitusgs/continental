<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temporada;
use App\Models\Programa;
use App\Http\Request\RequestTemporada;

class TemporadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $temporadas=Temporada::all();
      foreach($temporadas as $data){
          $data->programas=$this->getprograma($data->id);
      }
      return view('temporadas.index', compact('temporadas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestTemporada $request)
    {
      $data=$request->all();
      Temporada::create([
          'anio_inicio' => $data['anio_inicio'],
          'nombre' => $data['nombre'],
          'anio_fin' => $data['anio_fin'],
          'visible' => $request->boolean('visible')
      ]);
      return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $data=Temporada::where('id',$id)->first();
      return compact('data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestTemporada $request)
    {
      $data=$request->all();
      $temporada=Temporada::where('id',$data['id'])->first();
      $temporada->anio_inicio=$data['anio_inicio'];
      $temporada->anio_fin=$data['anio_fin'];
      $temporada->visible=$request->boolean('visible');
      $temporada->save();
      return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $temporada = Temporada::findOrFail($id);
      $temporada->delete();
      return true;
    }

    public function getprograma($id_programa)
    {
        $Programa=Programa::where('id_temporada',$id_programa)->get();
        return $Programa;
    }
}
