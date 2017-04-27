<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CitationStyle;

class CitationStyleController extends Controller
{
  public function index()
  {
      $styles = CitationStyle::all();
      return view('citationstyles.index', compact('styles'));
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
