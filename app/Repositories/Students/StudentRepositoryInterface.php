<?php
namespace App\Repositories\Students;

use App\Repositories\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{
    public function Gender();
    public function Faculty();
    public function Subject();
    public function createStudent($attributes);
    public function updateStudent($id, $attributes);
}
