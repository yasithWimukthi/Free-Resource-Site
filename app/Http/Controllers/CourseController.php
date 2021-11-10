<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index(){
        $course = Course::all();
        return view('course',['courses'=>$course]);
    }

    public function store(Request $request){
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'awarding_body' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
        ]);

        if(request('image')){
            $inputs['image'] = request('image')->store('course images');
        }

        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->awarding_body = $request->awarding_body;
        $course->image = $inputs['image'];

        $course->save();

        return back();
    }
}
