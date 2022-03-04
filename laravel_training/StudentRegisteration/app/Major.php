<?php

namespace App;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public function student(){

        return $this->hasOne('App\Student');
}
}
