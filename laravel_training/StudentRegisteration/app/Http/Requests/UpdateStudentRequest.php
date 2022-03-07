<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $student_id = $this->route('student')->id;

            return [
                "name" => ["required"],
                "email" => ["required", "unique:students,email,{$student_id}"],
                "major_id" => ["required"],
                "date_of_birth" => ["required"],
                "address" => ["required"]
            ];
    }
}
