<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use App\Models\Course;
use App\Models\Exam;

class ResourceController extends Controller
{
    public static function index(){
        $courses = Course::all();
        $awardingBodies = AwardingBody::all();
        return view('resource-new',['awardingbodies'=>$awardingBodies,'courses'=>$courses]);

//        $response = ['message' =>  'index function'];
//        return response($response, 200);
    }
}
