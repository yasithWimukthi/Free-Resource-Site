<?php

namespace App\Http\Livewire;

use App\Models\AwardingBody;
use Livewire\Component;
use function Sodium\add;

class Resource extends Component
{

    public $awardingBodies = [1,2,3];

    protected $listners = ['selectAwardingBody'];

    public function render()
    {
        $awardingBodies = AwardingBody::all();
        return view('livewire.resource',['awardingbodies'=>$awardingBodies])->extends('app');
    }

    public function selectAwardingBody($awardingBody)
    {
        $this->render();
    }
}
