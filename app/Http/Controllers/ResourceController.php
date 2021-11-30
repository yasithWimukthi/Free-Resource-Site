<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use App\Models\Course;
use App\Models\Exam;

class ResourceController extends Controller
{
    public function index(){
        $courses = Course::all();
        $awardingBodies = AwardingBody::all();
        return view('resource-new',['awardingbodies'=>$awardingBodies,'courses'=>$courses]);
    }
}
