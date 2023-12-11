<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectFormRequest;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $techs = Technology::all();
        return view('projects.create',compact('techs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectFormRequest $request)
    {
        $data = $request->validated();
       if($request->hasFile('image')){
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $path = time().'-'.$name;
        $file->move('uploads/projects',$path);
        $data['image'] = $path;
       }
       //dd($data);
       $project = Project::create($data);

       $project->techs()->attach($request->techs);

       return redirect(route('projects.index'))->with('success',"Project {$project->name} Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
      // dd($project->techs->contains('id',2));

        $techs = Technology::all();
        return view('projects.edit',compact('project','techs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectFormRequest $request, Project $project)
    {
        $data = $request->validated();

        $data['image'] = $project->image;

        if($request->hasFile('image')){
           // dd($project->image_path());

            if(File::exists($project->image_path())){
                File::delete($project->image_path());
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $path = time().'-'.$name;
            $file->move('uploads/projects',$path);
            $data['image'] = $path;
        }


        $project->techs()->sync($request->techs);
        $project->update($data);
        return redirect(route('projects.index'))->with('success',"Project {$project->name} Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if(File::exists($project->image_path())){
            File::delete($project->image_path());
        }
        $project->delete();
        return redirect(route('projects.index'))->with('success',"project {$project->name} Deleted Successfully");
    }
}
