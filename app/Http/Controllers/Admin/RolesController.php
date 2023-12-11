<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Http\Request\RequestRol;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $roles=Roles::all();
      foreach($roles as $data){
          $data->usuarios=$this->getusuario($data->id);
      }
      return view('roles.index', compact('roles'));
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
    public function store(RequestRol $request)
    {
      $data=$request->all();
      Roles::create([
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
      $data=Roles::where('id',$id)->first();
      return compact('data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestRol $request)
    {
      $data=$request->all();
      $rol=Roles::where('id',$data['id'])->first();
      $rol->nombre=$data['nombre'];
      $rol->visible=$request->boolean('visible');
      $rol->save();
      return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $rol = Roles::findOrFail($id);
      $rol->delete();
      return true;
    }

    public function getusuario($id_rol)
    {
        $Usuario=User::where('id_roles',$id_rol)->get();
        return $Usuario;
    }
}
