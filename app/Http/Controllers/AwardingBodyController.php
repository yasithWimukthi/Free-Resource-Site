<?php

namespace App\Http\Controllers;

use App\Models\AwardingBody;
use Illuminate\Http\Request;

class AwardingBodyController extends Controller
{
    public function store(Request $request){
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


        $awardingBody = new AwardingBody();
        $awardingBody->name = $request->name;
        $awardingBody->description = $request->description;


        $awardingBody->save();

        return back();
    }
}
