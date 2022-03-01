<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface TaskDaoInterface {
    public function get();

    public function store(Request $request);

    public function deleteById($id);
}
