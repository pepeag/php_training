<?php

namespace App\Http\Controllers\WebApi;

use App\Student;
use App\Http\Requests\WebApi\StoreStudentRequest;
use App\Http\Requests\WebApi\UpdateStudentRequest;

class StudentApiController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with("major")->latest()->get();

        return $this->successResponse([
            "students" => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return $this->successResponse([]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        $student = Student::find($student);

        if(!$student){
            return $this->errorResponse([], 404);
        }

        return $this->successResponse([
            "student" => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $student)
    {
        $student = Student::find($student);

        if(!$student){
            return $this->errorResponse([], 404);
        }

        $student->update($request->validated());

        return $this->successResponse([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student)
    {
        $student = Student::find($student);

        if(!$student){
            return $this->errorResponse([], 404);
        }

        $student->delete();

        return $this->successResponse([]);
    }
}
