<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use App\Models\Course;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                $document->save();
            }catch(Exception $e){
                return redirect('/document')->with('failed',"operation failed");
            }
        }

        return back();
    }

    function getDocumentByAwardingId(Request $request){
        $input = $request->all();
        \Log::info($input);
        $data = DB::table('documents')->whereIn('awarding_body_id',$input['id'])->get();
        echo json_encode($data);
        exit;
    }

    
    public function edit(Request $request,$id){
        $name = $request->input('name');
        $description = $request->input('description');
        $image = $request->input('image');
        $awardingBodyId = $request->input('awardingBodyId');
        $document = $request->input('document');
        DB::update('update documents set name = ?, description = ?, image = ?, awarding_body_id = ?, document = ? where id = ?',[$name,$description,$image,$awardingBodyId,$document,$id]);
        
        $documents = Document::all();
        $awardingBody = AwardingBody::all();
        return view('document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
    }

    public function remove($id){
        DB::update('DELETE FROM documents WHERE id= ?',[$id]);
        $documents = Document::all();
        $awardingBody = AwardingBody::all();
        return view('document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
    }


}
