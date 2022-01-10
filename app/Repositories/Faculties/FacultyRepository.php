<?php
namespace App\Repositories\Faculties;

use App\Repositories\BaseRepository;

class FacultyRepository extends BaseRepository implements FacultyRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Faculty::class;
    }

    public function getFaculty()
    {
//        $this->model->getLimit(8);
    }
}
