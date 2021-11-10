<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(Request $request){
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'course' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'document' => 'required|file'
        ]);

        if(request('image')){
            $inputs['image'] = request('image')->store('document images');
            $inputs['document'] = request('document')->store('documents');
        }

        $document = new Document();
        $document->name = $request->name;
        $document->description = $request->description;
        $document->course = $request->course;
        $document->image = $inputs['image'];
        $document->document = $inputs['document'];

        $document->save();

        return back();
    }
}
