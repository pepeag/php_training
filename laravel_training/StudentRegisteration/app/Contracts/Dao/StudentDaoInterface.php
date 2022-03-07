<?php

namespace App\Contracts\Dao;

use App\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

interface StudentDaoInterface {

    public function get();

    public function getMajor();

    public function update($request,$student);

    public function create($request);

    public function delete($student);
}
