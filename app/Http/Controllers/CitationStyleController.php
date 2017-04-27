<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitationStyleController extends Controller
{
  public function index()
  {
    return view('citationstyles.index');
  }

  public function create()
  {
    return view('citationstyles.create');
  }

  public function edit()
  {
    return view('citationstyles.edit');
  }
}
