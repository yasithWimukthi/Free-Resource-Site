<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Document;

class ResourceController extends Controller
{
    public static function index(){
        $courses = Course::all();
        $awardingBodies = AwardingBody::all();
        $exams = Exam::all();
        $documents = Document::all();
        return view('resource-new',[
            'awardingbodies'=>$awardingBodies,
            'courses'=>$courses,
            'exams'=>$exams,
            'documents'=>$documents]);

//        $response = ['message' =>  'index function'];
//        return response($response, 200);
    }
}
