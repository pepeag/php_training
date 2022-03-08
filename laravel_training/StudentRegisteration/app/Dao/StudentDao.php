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

    public function index()
    {
        return $this->model->when($search = request('searchData'), function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')->orWhere('date_of_birth', 'LIKE', '%' . $search . '%')
            ->orWhere('address', 'LIKE', '%' . $search . '%')
            ->orWhere(function ($query) use ($search) {
                $query->whereHas('major', function ($qry) use ($search) {
                    $qry->where('name', 'LIKE', '%' . $search . '%');
                });
            });
        })->get();
    }
}
