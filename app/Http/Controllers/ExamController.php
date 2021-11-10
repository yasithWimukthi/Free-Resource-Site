<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function store(Request $request){
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'course' => 'required',
            'image' => 'mimes:jpeg,png,jpg'
        ]);

        if(request('image')){
            $inputs['image'] = request('image')->store('exam images');
        }

        $exam = new Exam();
        $exam->name = $request->name;
        $exam->description = $request->description;
        $exam->course = $request->course;
        $exam->image = $inputs['image'];

        $exam->save();

        return back();
    }
}
