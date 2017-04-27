<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceTypeController extends Controller
{
  public function index()
  {
    return view('resourcetypes.index');
  }

  public function create()
  {
    return view('resourcetypes.create');
  }

  public function edit()
  {
    return view('resourcetypes.edit');
  }
}
