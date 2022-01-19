<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'image', 'birthday', 'address', 'phone_number', 'gender', 'faculty_id'];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject')->withPivot('id', 'mark');;
    }


}
