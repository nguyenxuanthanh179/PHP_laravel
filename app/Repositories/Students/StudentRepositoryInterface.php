<?php
namespace App\Repositories\Students;

use App\Repositories\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{
    public function gender();
    public function createStudent($attributes);
    public function updateStudent($id, $attributes);
}
