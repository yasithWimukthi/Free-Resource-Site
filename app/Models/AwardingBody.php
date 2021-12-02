<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AwardingBody extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'awarding_bodies';
    public $timestamps = true;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

}
