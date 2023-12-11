<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
class FrontendController extends Controller
{
    public function index(){
        $projects = Project::all();
        $technologies = Technology::all();
        return view('frontend.index',compact('technologies','projects'));
    }
}
