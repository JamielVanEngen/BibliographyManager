<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CitationStyle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class CitationStyleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $styles = CitationStyle::all();
      return view('citationstyles.index', compact('styles'));
    }

    public function alternateIndex()
    {
      $styles = CitationStyle::all();
      return view('citationstyles.alternateIndex', compact('styles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:197|min:5'
        ]);

        $citationStyle = new CitationStyle();

        $citationStyle->name = $request->get('name');
        $citationStyle->user_id = Auth::user()->id;

        $citationStyle->save();
        return response($citationStyle);
    }
    public function edit()
    {
        return view('citationstyles.edit');
    }
}
