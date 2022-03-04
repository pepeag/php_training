<?php

namespace App\Contracts\Services;

use App\Http\Requests\StoreStudentRequest;

interface StudentServiceInterface {

    public function get();

    public function getMajor();

    public function update($request,$student);

    public function create(StoreStudentRequest $request);

    public function delete($student);
}
