<?php

namespace App\Http\Controllers;

use App\Student;
use App\Mail\sendDeleteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Contracts\Services\StudentServiceInterface;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $studentService;
    public function __construct(StudentServiceInterface $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $items = $this->studentService->index();

        return view('students.index', ['items' => $items]);
    }

//    public function spaIndex()
//    {
//        $items = $this->studentService->index();
//
//        return view('students.index', ['items' => $items]);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = $this->studentService->getMajor();

        return view('students.create', ['majors' => $majors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
         $this->studentService->create($request);

        return redirect()->route('students.index')->with("success_msg", createdMessage("Student"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $majors = $this->studentService->getMajor();

        return view('students.edit')->with(['item' => $student, 'majors' => $majors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $this->studentService->update($request, $student);

        return redirect()->route('students.index')->with("success_msg", updatedMessage("Student"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $this->studentService->delete($student);
        
        $details = [
            "name" => $student->name,
            "message" => "Your record have been deleted",
        ];

        Mail::to($student->email)->send(new sendDeleteMail($details));

        return redirect()->back()->with("success_msg", deletedMessage("Student"));
    }

    public function export()
    {
        return $this->studentService->export();
    }

    public function import()
    {
        $this->studentService->import();

        return redirect()->route('students.index')->with("success_msg", importMessage("CSV File"));
    }

    public function importFile()
    {
       return view('students.import');
    }


//    public function search(Request $request){
//
//        $items = $this->studentService->search($request);
//
//         return view('students.index')->with(['items' => $items]);
//    }
}
