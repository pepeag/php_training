<?php

namespace App\Http\Controllers\WebApi;

use App\Major;

class MajorApiController extends BaseApiController
{
    public function index()
    {
        $majors = Major::orderBy("name")->get();

        return $this->successResponse([
            "majors" => $majors
        ]);
    }
}
