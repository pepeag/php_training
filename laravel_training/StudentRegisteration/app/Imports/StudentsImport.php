<?php

namespace App\Imports;

use App\Student;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function model(array $row)
    {
        return new Student([
            'name' => $row[0],
            'email' => $row[1],
            'date_of_birth' =>  $this->transformDate($row[2]),
            'address' => $row[3],
            'major_id' => $row[4],
        ]);
    }
}
