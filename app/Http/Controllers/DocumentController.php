<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{

    public function index(){
        $documents = Document::all();
        return view('document',['documents'=>$documents]);
    }

    public function store(Request $request){
        $rules =[
            'name' => 'required',
            'description' => 'required',
            'course' => 'required',
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
                $document = new Document();
                $document->name = $data['name'];
                $document->description = $data['description'];
                $document->image = $data['image'];
                $document->document = $data['document'];
                $data['image']->store('document images');
                $data['document']->store('documents');

                $document->save();
            }catch(Exception $e){
                return redirect('//document')->with('failed',"operation failed");
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
