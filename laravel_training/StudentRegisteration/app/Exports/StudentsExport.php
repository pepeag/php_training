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
        return ["ID","Name", "Email", "Date of Birth", "Address", "Major_ID","Created At","Updated At"];
    }

    public function collection()
    {
        return Student::all();

    }

}
