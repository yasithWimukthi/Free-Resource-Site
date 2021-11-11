<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardingBody extends Model
{
    use HasFactory;
    protected $table = 'awarding_bodies';
    public $timestamps = true;
    protected $guarded = [];
}
