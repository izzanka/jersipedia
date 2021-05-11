<?php

namespace App\Http\Controllers;

use App\Jersey;
use App\League;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $leagues = League::select('id','name','image')->get();
        $jerseys = Jersey::orderBy('sold','desc')->take(4)->get();

        return view('home',compact('leagues','jerseys'));
    }

}
