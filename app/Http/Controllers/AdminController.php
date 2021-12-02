<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use App\Models\Course;
use App\Models\Document;
use App\Models\Exam;

class AdminController extends Controller
{

    // public function __construct(){
    //     $this->middleware('admin');
    // }

    public function index(){
        $course = Course::all()->count();
        $awardingBody = AwardingBody::all()->count();
        $exams = Exam::all()->count();
        $documents = Document::all()->count();
        return view('admin',[
            'courses'=>$course,
            'awardingBodies' => $awardingBody,
            'exams' => $exams,
            'documents' => $documents
        ]);
    }
}
