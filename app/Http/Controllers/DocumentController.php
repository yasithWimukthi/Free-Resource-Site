<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use App\Models\Course;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{

    public function index(){
        $documents = Document::all();
        $awardingBody = AwardingBody::all();
        return view('document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
    }

    public function store(Request $request){
        $rules =[
            'name' => 'required',
            'description' => 'required',
            'awarding_body' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'document' => 'required|file'
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect('/document')
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
                if (request('document')){
                    $inputs['document'] = request('document')->store('documents');
                    request('document')->store('documents');
                }

                $document = new Document();
                $document->name = $data['name'];
                $document->description = $data['description'];
                $document->image = $inputs['image'];
                $document->document = $inputs['document'];
                $document->awarding_body_id = $data['awarding_body'];
                //$data['image']->store('document images');
                //$data['document']->store('documents');

                $document->save();
            }catch(Exception $e){
                return redirect('/document')->with('failed',"operation failed");
            }
        }


//        if(request('image')){
//            $inputs['image'] = request('image')->store('document images');
//            $inputs['document'] = request('document')->store('documents');
//        }
//
//        $document = new Document();
//        $document->name = $request->name;
//        $document->description = $request->description;
//        $document->course = $request->course;
//        $document->image = $inputs['image'];
//        $document->document = $inputs['document'];
//
//        $document->save();

        return back();
    }
}
