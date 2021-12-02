<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Exam extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'exams';
    public $timestamps = true;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function awardingBody(){
        return $this->belongsTo(AwardingBody::class);
    }
}
