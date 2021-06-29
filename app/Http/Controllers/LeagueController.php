<?php

namespace App\Http\Controllers;

use App\Jersey;
use App\League;

use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function index(League $league)
    {
        $title = $league->name;
        $jerseys = Jersey::where('league_id',$league->id)->latest()->paginate(8);
        return view('jersey',compact('jerseys','title'));
    }

}
