<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['mark', 'student_id', 'subject_id'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
