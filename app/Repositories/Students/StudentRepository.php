<?php
namespace App\Repositories\Students;

use App\Models\Faculty;

use App\Models\Subject;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Student::class;
    }
    public function createStudent($attributes)
    {
        if (!empty($attributes['image'])) {
            $imgPath = $attributes['image'];
            $filename = time().'_'.$imgPath->getClientOriginalName();
            $path_upload = 'uploads/student/';
            $imgPath->move($path_upload,$filename);
            $attributes['image'] = $path_upload.$filename;
        }
        $student = $this->model->create($attributes);
        $student->save();
    }
    public function updateStudent($id, $attributes)
    {
        $result = $this->findOrFail($id);

        if (!empty($attributes['image'])) {
            @unlink(public_path($attributes['image']));
            $imgPath = $attributes['image'];
            $filename = time().'_'.$imgPath->getClientOriginalName();
            $path_upload = 'uploads/student/';
            $imgPath->move($path_upload,$filename);
            $attributes['image'] = $path_upload.$filename;
        }
        return $result->update($attributes);

    }
    public function Faculty() {
        $array = [];
        $faculties = Faculty::all();
        foreach ($faculties as $value){
            $array[$value->id] = $value->name;
        }
        return $array;
    }
    public function Subject() {
        $array = [];
        $subjects = Subject::all();
        foreach ($subjects as $value){
            $array[$value->id] = $value->name;
        }
        return $array;
    }

    public function Gender() {
        $array = [
            '0' => 'Nam',
            '1' => 'Nữ'
        ];
        return $array;
    }
}
