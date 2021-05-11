<?php

namespace App\Http\Controllers\Admin;

use App\Jersey;
use App\League;
use App\Http\Controllers\Controller;

use Spatie\Image\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class JerseyController extends Controller
{
    public function index(Request $request)
    {
        $title = 'List Jersey';
        if($request->search){
            $jerseys = Jersey::where('name','like','%' . $request->search . '%')->latest()->paginate(8);
        }else{
            $jerseys = Jersey::latest()->paginate(8);
        }
        return view('admin.jersey-index',compact('jerseys','title'));
    }

    public function edit($id)
    {
        $jersey = Jersey::findOrFail($id);
        $leagues = League::get();
        return view('admin.jersey-edit',compact('jersey','leagues'));
    }

    public function create()
    {
        $leagues = League::get();
        return view('admin.jersey-create',compact('leagues'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'league_id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048'
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                
                Image::load($image)->width(600)->height(600)->save();

                $image->move('images/jersey/',$imageName);

                Jersey::create([
                    'league_id' => $request->league_id,
                    'name' => $request->name,
                    'description' => $request->name,
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'weight' => $request->weight,
                    'image' => $imageName
                ]);
                
                return back()->with('message',['text' => 'Jersey successfully added!', 'class' => 'success']);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $jersey = Jersey::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);

        if($validator->fails()){
            return back()
                   ->withErrors($validator)
                   ->withInput();
        }else{
            $jersey->name = $request->name;
            $jersey->description = $request->description;
            $jersey->price = $request->price;
            $jersey->stock = $request->stock;
            $jersey->weight = $request->weight;
            $jersey->update();

            return back()->with('message',['text' => 'Jersey successfully updated!', 'class' => 'success']);
        }
    }

    public function destroy($id)
    {
        $jersey = Jersey::findOrFail($id);
        $jersey->delete();

        File::delete('images/jersey/' . $jersey->image);

        return redirect('jerseys')->with('message',['text' => 'Jersey successfully deleted!', 'class' => 'success']);
    }
}
