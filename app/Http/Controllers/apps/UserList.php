<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserList extends Controller
{
  public function index()
  {
    return view('content.apps.app-user-list');
  }

  public function getUsersData()
  {
    $users = User::select(['id', 'name','email'])->get();

    $formattedData = [
        'data' => $users
    ];

    return response()->json($formattedData);
  }

  
}
