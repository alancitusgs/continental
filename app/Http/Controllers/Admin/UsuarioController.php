<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Temporada;
use App\Http\Request\RequestPrograma;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $usuarios=User::get();
      $activos=User::where('visible',1)->count();
      $desactivos=User::where('visible',0)->count();
      return view('usuarios.index',compact('usuarios','activos','desactivos'));
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
    public function store(RequestPrograma $request)
    {
      $data=$request->all();
      Programa::create([
        'nombre' => $data['nombre'],
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
      $data=User::where('id',$id)->first();
      return compact('data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      $data=$request->all();
      $programa=Programa::where('id',$data['id'])->first();
      $programa->nombre=$data['nombre'];
      $programa->id_temporada=$data['id_temporada'];
      $programa->visible=$request->boolean('visible');
      $programa->save();
      return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return true;
    }

    // public function getprogramas()
    // {
    //   $programa=DB::table('programa as p')
    //         ->select('p.id as id','p.nombre as nombre', DB::raw("CASE p.visible WHEN 1 THEN 'Activo' ELSE 'Desactivo' END as estado"),'t.anio_inicio as anio_inicio', 't.anio_fin as anio_fin')
    //         ->leftjoin('temporada as t','t.id','=','p.id_temporada')
    //         ->get();
    //   return $programa;
    // }

}
