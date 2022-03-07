<?php
namespace App\Dao;

use App\Major;
use App\Student;
use App\Contracts\Dao\StudentDaoInterface;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentDao implements StudentDaoInterface{

    private $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function get(){

        return $this->model->with("major")->latest()->get();
    }

    public function getMajor(){

        return $this->model = Major::orderBy("name")->get()->pluck("name", "id");
    }
    public function create($request){

        return $this->model->create($request->validated());
    }

    public function update($request,$student){

       return $student->update($request->validated());
    }

    public function delete($student){
        return $student->delete();
    }
}
