<?php

namespace App\Services;

use App\Contracts\Dao\TaskDaoInterface;
use App\Contracts\Services\TaskServiceInterface;
use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface
{
    private $taskDao;

    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    public function get()
    {
        return $this->taskDao->get();
    }

    public function store(Request $request)
    {
        return $this->taskDao->store($request);
    }

    public function deleteById($id)
    {
        return $this->taskDao->deleteById($id);
    }
}
