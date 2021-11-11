<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use Illuminate\Http\Request;
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
}
