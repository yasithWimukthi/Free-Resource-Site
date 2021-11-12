<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AwardingBodyController extends Controller
{

    public function index(){
        $awardingBodies = AwardingBody::all();
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

        return back();
    }

    public function edit(Request $request,$id){
        $name = $request->input('name');
        DB::update('update awarding_bodies set name = ? where id = ?',[$name,$id]);
        $awardingBodies = AwardingBody::all();
        return view('awardingbody',['awardingbodies'=>$awardingBodies]);
    }

    public function remove($id){
        DB::update('DELETE FROM awarding_bodies WHERE id= ?',[$id]);
        $awardingBodies = AwardingBody::all();
        return view('awardingbody',['awardingbodies'=>$awardingBodies]);
    }
}
