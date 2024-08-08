<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonnesController extends Controller
{
    public function index(){
        return view('personnes.index');
    }
    public function maj(){
      if (!Auth::user()->can('personnes.maj')) {
        return redirect()->route('home');
      }
      return view('personnes.maj');
    }
}
