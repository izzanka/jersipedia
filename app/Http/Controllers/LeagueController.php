<?php

namespace App\Http\Controllers;

use App\Jersey;
use App\League;

use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function index($id)
    {
        $league = League::find($id);
        $title = $league->name;
        $jerseys = Jersey::where('league_id',$id)->latest()->paginate(8);
        return view('jersey',compact('jerseys','title'));
    }

}
