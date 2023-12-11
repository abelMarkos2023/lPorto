<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::paginate(5);
        return view('technologies.index',compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $tech = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time() . "-". $file->getClientOriginalName();
            $file->move('uploads/tech',$name);
            $tech['image'] = $name;
        }
        $data = new Technology;
        $data->name = $tech['name'];
        $data->image = $tech['image'];
        $data->save();
        return redirect(route('technologies.index'))->with('success','Technology Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit',compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $tech = $request->validate([
            'name'  => 'required|string|max:255',
        ]);
        if($request->hasFile('image')){
            if(File::exists($technology->image_path())){
              //  dd($technology->image_path());

                File::delete($technology->image_path());
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time() . "-". $file->getClientOriginalName() ;
            $file->move('uploads/tech',$name);
            $tech['image'] = $name;
        }
        $technology->name = $tech['name'];
        $technology->image = $tech['image'] ?? $technology->image;
        $technology->update();
        return redirect(route('technologies.index'))->with('success','Technology Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        if(File::exists($technology->image_path())){
            File::delete($technology->image_path());
        }
        $technology->delete();
        return redirect(route('technologies.index'))->with('success','Technology Deleted Successfully');
    }
}
