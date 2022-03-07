<?php
namespace App\Services;

use App\Contracts\Dao\StudentDaoInterface;
use App\Http\Requests\StoreStudentRequest;
use App\Contracts\Services\StudentServiceInterface;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function create($request){

        return $this->studentDao->create($request);

    }
    public function delete($student){
        return $this->studentDao->delete($student);
    }

    public function export(){

        return Excel::download(new StudentsExport, 'student_data.csv');
    }

    public function import(){

       return Excel::import(new StudentsImport,request()->file('file'));
    }
}
