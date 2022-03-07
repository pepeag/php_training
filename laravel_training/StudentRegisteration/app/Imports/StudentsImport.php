<?php

namespace App\Imports;

use App\Student;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StudentsImport implements ToModel,WithHeadingRow
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
            'name' => $row['name'],
            'email' => $row['email'],
            'date_of_birth' =>  $this->transformDate($row['date_of_birth']),
            'address' => $row['address'],
            'major_id' => $row['major_id'],
        ]);
    }
}
