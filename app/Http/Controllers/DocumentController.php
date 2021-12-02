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

    public function index(Request $request){
        $documents = Document::all();
        $awardingBody = AwardingBody::all();

        if($request->has('view_deleted')){
            $documents = Document::onlyTrashed()->get();
            return view('deleted-document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
        }

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

        $documents = Document::all();
        $awardingBody = AwardingBody::all();
        return view('document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
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
        
        $image = "";
        $document = "";

        if($request->input('image')){
            $image = $request->input('updateImage');
        }else{
            $image = $request->input('pimage');
        }

        if($request->input('image')){
            $document = $request->input('updateImage');
        }else{
            $document = $request->input('pdoc');
        }

        if($request->input('image')){
            $image = $request->input('updateImage');
        }else{
            $image = $request->input('pimage');
        }

        $documents = Document::all();
        $awardingBody = AwardingBody::all();
        return view('document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
    }

    public function remove($id){
        Document::find($id)->delete();
        // DB::update('DELETE FROM documents WHERE id= ?',[$id]);
        $documents = Document::all();
        $awardingBody = AwardingBody::all();
        return view('document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
    }

    public function restore($id)
    {
        Document::withTrashed()->find($id)->restore();

        $documents = Document::all();
        $awardingBody = AwardingBody::all();
        return view('document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
    }

    public function restoreAll()
    {
        Document::onlyTrashed()->restore();

        $documents = Document::all();
        $awardingBody = AwardingBody::all();
        return view('document',['documents'=>$documents,'awardingBodies' => $awardingBody]);
    }


}
