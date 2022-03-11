<?php
namespace App\Services;

use App\Contracts\Dao\StudentDaoInterface;
use App\Contracts\Services\StudentServiceInterface;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class StudentService implements StudentServiceInterface
{

    private $studentDao;

    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    public function get()
    {

        return $this->studentDao->get();

    }

    public function getMajor()
    {

        return $this->studentDao->getMajor();
    }

    public function update($request, $student)
    {

        return $this->studentDao->update($request, $student);
    }

    public function create($request)
    {

        $student = $this->studentDao->create($request);

        $details = [
            'name' => $student->name,
            'email' => $student->email,
            'date_of_birth' => $student->date_of_birth,
            'address' => $student->address,
        ];
        Mail::to($student->email)->send(new sendMail($details));
        return $student;

    }

    public function delete($student)
    {

        $student = $this->studentDao->delete($student);
        return $student;
    }

    public function export()
    {

        return Excel::download(new StudentsExport, 'student_data.csv');
    }

    public function import()
    {

        return Excel::import(new StudentsImport, request()->file('file'));
    }

    public function index()
    {
        return $this->studentDao->index();
    }
}
