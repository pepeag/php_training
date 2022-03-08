<?php
namespace App\Dao;

use App\Contracts\Dao\StudentDaoInterface;
use App\Major;
use App\Student;

class StudentDao implements StudentDaoInterface
{

    private $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function get()
    {

        return $this->model->with("major")->latest()->get();
    }

    public function getMajor()
    {

        return $this->model = Major::orderBy("name")->get()->pluck("name", "id");
    }
    public function create($request)
    {

        return $this->model->create($request->validated());
    }

    public function update($request, $student)
    {

        return $student->update($request->validated());
    }

    public function delete($student)
    {
        return $student->delete();
    }

    public function search($request)
    {

        $key = $request->searchData;

        return $this->model->with("major")->orWhere('name', 'LIKE', '%' . $key . '%')
            ->orWhere('email', 'LIKE', '%' . $key . '%')->orWhere('date_of_birth', 'LIKE', '%' . $key . '%')
            ->orWhere('address', 'LIKE', '%' . $key . '%')
            ->orWhere(function ($query) use ($key) {
                $query->whereHas('major', function ($q) use ($key) {
                    $q->where('name', 'LIKE', '%' . $key . '%');
                });
            })->get();
    }
}
