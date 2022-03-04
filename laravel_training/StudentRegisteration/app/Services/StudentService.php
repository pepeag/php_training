<?php
namespace App\Services;

use App\Contracts\Dao\StudentDaoInterface;
use App\Http\Requests\StoreStudentRequest;
use App\Contracts\Services\StudentServiceInterface;

class StudentService implements StudentServiceInterface{

    private $studentDao;

    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    public function get(){

        return $this->studentDao->get();
    }

    public function getMajor(){

        return $this->studentDao->getMajor();
    }

    public function update($request,$student){

        return $this->studentDao->update($request, $student);
    }

    public function create(StoreStudentRequest $request){

        return $this->studentDao->create($request);

    }
    public function delete($student){
        return $this->studentDao->delete($student);
    }
}
