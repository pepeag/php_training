<?php 
$line=1;
$txt_file = fopen('allFile/hellotxt.txt','r');
echo "<h2>I am Text File!</h2>";
while ($line = fgets($txt_file)) {
 echo(" ".$line)."<br>";
 $line++;
}
fclose($txt_file);

//Excel
require 'vendor/autoload.php';

use League\Csv\Reader;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("allFile/Book1.xlsx");

$sheetData = $spreadsheet->getActiveSheet()->toArray();
unset($sheetData[0]);
$index = 1;
echo "<br><br>";
echo "<h2>I am Excel!</h2>";
foreach ($sheetData as $data) {
    // process element here;
    echo " " . $data[0] . " , " . $data[1] . " , " . $data[2] . " , " . $data[3] . " , " . $t[4] . " <br>";
    $index++;
}

// CSV
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$csv = Reader::createFromPath('allFile/sample_csv.csv', 'r');
$csv->setHeaderOffset(0);

$header = $csv->getHeader(); //returns the CSV header record
$records = $csv->getRecords(); //returns all the CSV records as an Iterator object
echo "<br><br>";
echo "<h2>I am CSV!</h2>";
echo $csv->toString(); //returns the CSV document as a string

//Document
function parseWord($userDoc)
{
    $fileHandle = fopen($userDoc, "r");
    $line = @fread($fileHandle, filesize($userDoc));
    $lines = explode(chr(0x0D), $line);
    $outtext = "";
    foreach ($lines as $thisline) {
        $pos = strpos($thisline, chr(0x00));
        if (($pos !== false) || (strlen($thisline) == 0)) {
        } else {
            $outtext .= $thisline . " ";
        }
    }
    $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", "", $outtext);
    return $outtext;
}
$userDoc = "allFile/hellodocs.doc";
$text = parseWord($userDoc);
echo "<br><br>";
echo "<h2>I am Document!</h2>";
echo $text;
