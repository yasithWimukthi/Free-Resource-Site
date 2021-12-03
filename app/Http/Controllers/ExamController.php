<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{

    public function index(Request $request){
        $exams = Exam::all();
        $awardingBody = AwardingBody::all();

        if($request->has('view_deleted')){
            $exams = Exam::onlyTrashed()->get();
            return view('deleted-exams',['exams'=>$exams,'awardingBodies' => $awardingBody]);
        }

        return view('exam',['exams'=>$exams,'awardingBodies' => $awardingBody]);
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
                $inputs = [];
                if(request('image')){
                    $inputs['image'] = request('image')->store('course images');
                    request('image')->store('course images');
                }

                $exam = new Exam();
                $exam->name = $data['name'];
                $exam->description = $data['description'];
                $exam->image = $inputs['image'];
                $exam->awarding_body_id = $data['awarding_body'];
                $exam->save();
            }catch(Exception $e){
                return redirect('/exam')->with('failed',"operation failed");
            }
        }

        if(request('image')){
            $inputs['image'] = request('image')->store('course images');
        }

        $exams = Exam::all();
        $awardingBody = AwardingBody::all();
        return view('exam',['exams'=>$exams,'awardingBodies' => $awardingBody]);
    }

    function getExamByAwardingId(Request $request){
        $input = $request->all();
        \Log::info($input);
        $data = DB::table('exams')->whereIn('awarding_body_id',$input['id'])->get();
        $data = Exam::all();
        echo json_encode($data);
        exit;
    }

    function getAllExams(){
        $data = Exam::all();
        echo json_encode($data);
        exit;
    }

    public function edit(Request $request,$id){
        $name = $request->input('name');
        $description = $request->input('description');
        $image = "";

        if($request->input('image')){
            $image = $request->input('updateImage');
        }else{
            $image = $request->input('pimage');
        }

        $awardingBodyId = $request->input('updateAwardingBody');
        DB::update('update exams set name = ?, description = ?, image = ?, awarding_body_id = ? where id = ?',[$name,$description,$image,$awardingBodyId,$id]);
        
        $exams = Exam::all();
        $awardingBody = AwardingBody::all();
        return view('exam',['exams'=>$exams,'awardingBodies' => $awardingBody]);
    }

    public function remove($id){
        Exam::find($id)->delete();
        $exams = Exam::all();
        $awardingBody = AwardingBody::all();
        return view('exam',['exams'=>$exams,'awardingBodies' => $awardingBody]);
    }

    public function restore($id)
    {
        Exam::withTrashed()->find($id)->restore();

        $exams = Exam::all();
        $awardingBody = AwardingBody::all();
        return view('exam',['exams'=>$exams,'awardingBodies' => $awardingBody]);
    }

    public function restoreAll()
    {
        Exam::onlyTrashed()->restore();

        $exams = Exam::all();
        $awardingBody = Exam::all();
        return view('exam',['exams'=>$exams,'awardingBodies' => $awardingBody]);
    }
}
