<?php

namespace App\View\Components;

use App\Jersey;
use Illuminate\View\Component;

class Jerseys extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $jerseys = Jersey::count();
        return view('components.jerseys',compact('jerseys'));
    }
}
