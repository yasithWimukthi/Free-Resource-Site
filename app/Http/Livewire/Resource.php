<?php

namespace App\Http\Livewire;

use App\Models\AwardingBody;
use Livewire\Component;

class Resource extends Component
{
    public function render()
    {
        $awardingBodies = AwardingBody::all();
        return view('livewire.resource',['awardingbodies'=>$awardingBodies])->extends('app');
    }
}
