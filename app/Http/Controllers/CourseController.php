<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDOException;

class CourseController extends Controller
{

    public function index(){
        $course = Course::all();
        return view('course',['courses'=>$course]);
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'awarding_body' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect('/exam')
                ->withInput()
                ->withErrors($validator);
        }else{
            $data = $request->input();
            try{
                $exam = new Exam();
                $exam->name = $data['name'];
                $exam->description = $data['description'];
                $exam->image = $data['image'];
                $data['image']->store('course images');
                $exam->save();
            }catch(Exception $e){
                return redirect('/exam')->with('failed',"operation failed");
            }
        }

//        if(request('image')){
//            $inputs['image'] = request('image')->store('course images');
//        }

//        $course = new Course();
//        $course->name = $request->name;
//        $course->description = $request->description;
//        $course->awarding_body = $request->awarding_body;
//        $course->image = $inputs['image'];
//
//        $course->save();

        return back();
    }
}
