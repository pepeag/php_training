<?php

namespace App\Contracts\Services;

use App\Http\Requests\StoreStudentRequest;

interface StudentServiceInterface {

    public function get();

    public function getMajor();

    public function update($request,$student);

    public function create($request);

    public function delete($student);

    public function export();

    public function import();
}
