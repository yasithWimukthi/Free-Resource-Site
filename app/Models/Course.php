<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    public $timestamps = true;
    protected $guarded = [];

    public function awardingBody(){
        return $this->belongsTo(AwardingBody::class);
    }
}
