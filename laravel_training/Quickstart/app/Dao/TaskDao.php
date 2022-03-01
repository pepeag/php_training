<?php

namespace App\Dao;

use App\Contracts\Dao\TaskDaoInterface;
use App\Task;
use Illuminate\Http\Request;

class TaskDao implements TaskDaoInterface {
    private $model;

    public function __construct(Task $model) {
        $this->model = $model;
    }

    public function get(){
        return $this->model->orderBy("created_at")->get();
    }

    public function store(Request $request){
        return $this->model->create($request->all());
    }

    public function deleteById($id){
        return $this->model->findOrFail($id)->delete();
    }
}
