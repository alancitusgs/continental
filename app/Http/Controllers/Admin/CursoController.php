<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Temporada;
use App\Http\Request\RequestCurso;
use App\Models\Programa;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // $Cursos=$this->getCursos();
      $cursos=Curso::get();
      $activos=Curso::where('visible',1)->count();
      $desactivos=Curso::where('visible',0)->count();
      return view('cursos.index',compact('cursos','activos','desactivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     Curso::create($request->all());
     session()->flash('swal',[
      // 'icon' => 'success',
      //  'title' => 'Bien',
      //  'text' => 'Se registro el curso correctamente.',
      // 'position' => 'top-end',
      'icon' => 'success',
      'title' => 'Se registró el curso satisfactoriamente',
      'showConfirmButton' => false,
      'timer' => 1500,
      ]);
      

     return redirect()->route('app-acceso-cursos');
      
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
      $data=Curso::where('id',$id)->first();
      return compact('data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      $data=$request->all();
      $Curso=Curso::where('id',$data['id'])->first();
      $Curso->nombre=$data['nombre'];
      $Curso->id_temporada=$data['id_temporada'];
      $Curso->visible=$request->boolean('visible');
      $Curso->save();
      return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $Curso = Curso::findOrFail($id);
      $Curso->delete();
      return true;
    }

    public function carpeta()
    {
      return view('cursos.carpetas');
    }

    public function buscarCurso(Request $request)
    {
        $codigoAsignatura = $request->codigo_asignatura;

        // Buscar el curso en base al código de la asignatura
        $curso = Curso::where('codigo_asignatura', $codigoAsignatura)->first();

        if ($curso) {
            return response()->json(['nombre_curso' => $curso->nombre_curso]);
        } else {
            return response()->json(['nombre_curso' => '']);
        }
    }



}
