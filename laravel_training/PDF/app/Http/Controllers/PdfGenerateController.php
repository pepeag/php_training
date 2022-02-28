<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class PdfGenerateController extends Controller

{

    public function PDFgenerate()

    {

        $data = ['title' => 'NiceSnippets Blog'];

        $pdf = PDF::loadView('myPDF', $data);



        return $pdf->download('pepeag.pdf');

    }

}
