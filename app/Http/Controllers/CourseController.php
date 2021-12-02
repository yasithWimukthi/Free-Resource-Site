<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PDOException;
use Symfony\Component\Console\Input\Input;

class CourseController extends Controller
{

    public function index(Request $request){
        $course = Course::all();
        $awardingBody = AwardingBody::all();

        if($request->has('view_deleted')){
            $course = Course::onlyTrashed()->get();
            return view('deleted-courses',['courses'=>$course,'awardingBodies' => $awardingBody]);
        }

        return view('course',['courses'=>$course,'awardingBodies' => $awardingBody]);
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
            return redirect('/course')
                ->withInput()
                ->withErrors($validator);
        }else{
            $data = $request->input();
            try{
                $inputs = [];
                if(request('image')){
                    $inputs['image'] = request('image')->store('course images');
                    request('image')->store('course images');
                }

                $course = new Course();
                $course->name = $data['name'];
                $course->description = $data['description'];
                $course->image = $inputs['image'];
                $course->awarding_body_id = $data['awarding_body'];
                $course->save();
            }catch(Exception $e){
                return redirect('/exam')->with('failed',"operation failed");
            }
        }

        if(request('image')){
            $inputs['image'] = request('image')->store('course images');
        }

        $course = Course::all();
        $awardingBody = AwardingBody::all();
        return view('course',['courses'=>$course,'awardingBodies' => $awardingBody]);
    }

    function getCoursesByAwardingId(Request $request){
        $input = $request->all();
        \Log::info($input);
        $data = DB::table('courses')->whereIn('awarding_body_id',$input['id'])->get();
        echo json_encode($data);
        exit;
    }

    function getCoursesById(Request $request){
        $input = $request->all();
        \Log::info($input);
        $data = DB::table('courses')->whereIn('id',$input['id'])->get();
        echo json_encode($data);
        exit;
    }

    public function edit(Request $request,$id){
        $name = $request->input('name');
        $description = $request->input('description');
        $image = "";

        if($request->input('image')){
            $image = $request->input('document');
        }else{
            $image = $request->input('pimage');
        }

        $awardingBodyId = $request->input('updateAwardingBody');
        DB::update('update courses set name = ?, description = ?, image = ?, awarding_body_id = ? where id = ?',[$name,$description,$image,$awardingBodyId,$id]);
        
        $course = Course::all();
        $awardingBody = AwardingBody::all();
        return view('course',['courses'=>$course,'awardingBodies' => $awardingBody]);
    }

    public function remove($id){
        Course::find($id)->delete();
        //DB::update('DELETE FROM courses WHERE id= ?',[$id]);
        $course = Course::all();
        $awardingBody = AwardingBody::all();
        return view('course',['courses'=>$course,'awardingBodies' => $awardingBody]);
    }

    
    public function restore($id)
    {
        Course::withTrashed()->find($id)->restore();

        $course = Course::all();
        $awardingBody = AwardingBody::all();
        return view('course',['courses'=>$course,'awardingBodies' => $awardingBody]);
    }

    public function restoreAll()
    {
        Course::onlyTrashed()->restore();

        $course = Course::all();
        $awardingBody = AwardingBody::all();
        return view('course',['courses'=>$course,'awardingBodies' => $awardingBody]);
    }
}
