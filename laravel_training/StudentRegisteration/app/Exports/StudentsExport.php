<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return ["Name", "Email", "Date of Birth", "Address", "Major_ID"];
    }

    public function collection()
    {
        return Student::select('name','email','date_of_birth','address','major_id')->get();

    }

}
