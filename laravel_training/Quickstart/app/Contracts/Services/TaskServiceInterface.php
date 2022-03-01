<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface TaskServiceInterface {
    public function get();

    public function store(Request $request);

    public function deleteById($id);
}
