<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produccion;



class ProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // $Produccions=$this->getProduccions();
      $producciones=Produccion::get();
      $activos=Produccion::where('visible',1)->count();
      $desactivos=Produccion::where('visible',0)->count();
      return view('produccion.index',compact('producciones','activos','desactivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('produccion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     Produccion::create($request->all());
     session()->flash('swal',[
      // 'icon' => 'success',
      //  'title' => 'Bien',
      //  'text' => 'Se registro el Produccion correctamente.',
      // 'position' => 'top-end',
      'icon' => 'success',
      'title' => 'Se registró el Produccion satisfactoriamente',
      'showConfirmButton' => false,
      'timer' => 1500,
      ]);
      

     return redirect()->route('app-acceso-produccion');
      
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
      $data=Produccion::where('id',$id)->first();
      return compact('data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      $data=$request->all();
      $Produccion=Produccion::where('id',$data['id'])->first();
      $Produccion->nombre=$data['nombre'];
      $Produccion->id_temporada=$data['id_temporada'];
      $Produccion->visible=$request->boolean('visible');
      $Produccion->save();
      return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $Produccion = Produccion::findOrFail($id);
      $Produccion->delete();
      return true;
    }

    public function carpeta()
    {
      return view('Produccions.carpetas');
    }

    public function buscarProduccion(Request $request)
    {
        $codigoAsignatura = $request->codigo_asignatura;

        // Buscar el Produccion en base al código de la asignatura
        $Produccion = Produccion::where('codigo_asignatura', $codigoAsignatura)->first();

        if ($Produccion) {
            return response()->json(['nombre_Produccion' => $Produccion->nombre_Produccion]);
        } else {
            return response()->json(['nombre_Produccion' => '']);
        }
    }



}
