<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StudentsImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    //public function transformDate($value, $format = 'd/m/Y')
    //{
    //    try {
    //        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    //    } catch (\ErrorException $e) {
    //        return \Carbon\Carbon::createFromFormat($format, $value)->toDateTimeString();
    //    }
    //}

    public function model(array $row)
    {
        return new Student([
            'name' => $row['name'],
            'email' => $row['email'],
            'date_of_birth' => $row['date_of_birth'],
            'address' => $row['address'],
            'major_id' => $row['major_id'],
        ]);
    }
}
