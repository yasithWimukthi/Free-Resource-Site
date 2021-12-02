<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AwardingBodyController extends Controller
{

    public function index(Request $request){

        $awardingBodies = AwardingBody::all();
        if($request->has('view_deleted')){
            $awardingBodies = AwardingBody::onlyTrashed()->get();
            return view('deleted-awarding-body',['awardingbodies'=>$awardingBodies]);
        }

        
        return view('awardingbody',['awardingbodies'=>$awardingBodies]);
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect('/awarding-body')
                ->withInput()
                ->withErrors($validator);
        }else{
            $data = $request->input();
            try{
                $awardingBody = new AwardingBody();
                $awardingBody->name = $data['name'];
                $awardingBody->description = $data['description'];
                $awardingBody->save();

            }catch (Exception $e){
                return redirect('/awarding-body')->with('failed',"operation failed");
            }
        }

        $awardingBodies = AwardingBody::all();
        return view('awardingbody',['awardingbodies'=>$awardingBodies]);
    }

    public function edit(Request $request,$id){
        $name = $request->input('name');
        $description = $request->input('description');
        DB::update('update awarding_bodies set name = ?, description = ? where id = ?',[$name,$description,$id]);
        $awardingBodies = AwardingBody::all();
        return view('awardingbody',['awardingbodies'=>$awardingBodies]);
    }

    public function remove($id){
        //DB::update('DELETE FROM awarding_bodies WHERE id= ?',[$id]);
        AwardingBody::find($id)->delete();
        $awardingBodies = AwardingBody::all();
        return view('awardingbody',['awardingbodies'=>$awardingBodies]);
    }

    public function restore($id)
    {
        AwardingBody::withTrashed()->find($id)->restore();

        $awardingBodies = AwardingBody::all();
        return view('awardingbody',['awardingbodies'=>$awardingBodies]);
    }

    public function restoreAll()
    {
        AwardingBody::onlyTrashed()->restore();

        $awardingBodies = AwardingBody::all();
        return view('awardingbody',['awardingbodies'=>$awardingBodies]);
    }

}
