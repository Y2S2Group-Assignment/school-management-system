<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use FPDF\FPDF;

// Assuming you have fetched $rows and $rowspanData from the database
$rows = [
    ['YearEN' => '2021', 'SemesterEN' => '1', 'MajorEN' => 'CS', 'BatchEN' => 'BSc', 'DegreeNameEN' => 'Bachelor', 'StudentID' => '12345', 'NameInLatin' => 'John Doe', 'SexEN' => 'M', 'DateSubjectFall' => '2021-06-15', 'SubjectEN' => 'Math', 'LecturerEN' => 'Mr. Smith'],
    ['YearEN' => '2021', 'SemesterEN' => '1', 'MajorEN' => 'CS', 'BatchEN' => 'BSc', 'DegreeNameEN' => 'Bachelor', 'StudentID' => '67890', 'NameInLatin' => 'Jane Doe', 'SexEN' => 'F', 'DateSubjectFall' => '2021-06-15', 'SubjectEN' => 'Physics', 'LecturerEN' => 'Ms. Johnson']
    // Add more rows as needed
];

$rowspanData = []; // Populate this array with your rowspan calculation data

if (isset($_POST['savePDF'])) {
    generatePDF($rows, $rowspanData);
} elseif (isset($_POST['saveExcel'])) {
    generateExcel($rows, $rowspanData);
}

function generatePDF($rows, $rowspanData) {
    class PDF extends FPDF {
        function Header() {
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Student Subject Fail Report', 0, 1, 'C');
            $this->Ln(10);
        }

        function Table($header, $data, $rowspanData) {
            $this->SetFont('Arial', 'B', 10);
            foreach ($header as $col) {
                $this->Cell(25, 7, $col, 1);
            }
            $this->Ln();
            
            $this->SetFont('Arial', '', 10);
            foreach ($data as $index => $row) {
                $key = $row['YearEN'] . '-' . $row['SemesterEN'] . '-' . $row['BatchEN'] . '-' . $row['DegreeNameEN'];
                $rowspan = $rowspanData[$key]['count'];
                $startIndex = $rowspanData[$key]['startIndex'];
                if ($index == $startIndex) {
                    $this->Cell(25, 6, $row['YearEN'], 1, 0, '', false, $rowspan);
                    $this->Cell(25, 6, $row['SemesterEN'], 1, 0, '', false, $rowspan);
                    $this->Cell(25, 6, $row['MajorEN'], 1, 0, '', false, $rowspan);
                    $this->Cell(25, 6, $row['BatchEN'] . " " . $row['DegreeNameEN'], 1, 0, '', false, $rowspan);
                }
                $this->Cell(25, 6, $row['StudentID'], 1);
                $this->Cell(25, 6, $row['NameInLatin'], 1);
                $this->Cell(25, 6, $row['SexEN'], 1);
                $this->Cell(25, 6, $row['DateSubjectFall'], 1);
                $this->Cell(25, 6, $row['SubjectEN'] . " Lecturer: " . $row['LecturerEN'], 1);
                $this->Ln();
            }
        }
    }

    $header = ['Year', 'Semester', 'Major', 'Academic Title', 'StudentID', 'Name', 'Gender', 'Date', 'Subject Fail'];
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->Table($header, $rows, $rowspanData);
    $pdf->Output('D', 'student_subject_fail_report.pdf');
}

function generateExcel($rows, $rowspanData) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Student Subject Fail Report');

    // Set the header
    $header = ['Year', 'Semester', 'Major', 'Academic Title', 'StudentID', 'Name', 'Gender', 'Date', 'Subject Fail'];
    $sheet->fromArray($header, NULL, 'A1');

    // Set the data
    $data = [];
    foreach ($rows as $index => $row) {
        $key = $row['YearEN'] . '-' . $row['SemesterEN'] . '-' . $row['BatchEN'] . '-' . $row['DegreeNameEN'];
        $rowspan = $rowspanData[$key]['count'];
        $startIndex = $rowspanData[$key]['startIndex'];
        if ($index == $startIndex) {
            $rowData = [
                $row['YearEN'],
                $row['SemesterEN'],
                $row['MajorEN'],
                $row['BatchEN'] . " " . $row['DegreeNameEN'],
                $row['StudentID'],
                $row['NameInLatin'],
                $row['SexEN'],
                $row['DateSubjectFall'],
                $row['SubjectEN'] . " Lecturer: " . $row['LecturerEN']
            ];
        } else {
            $rowData = [
                '',
                '',
                '',
                '',
                $row['StudentID'],
                $row['NameInLatin'],
                $row['SexEN'],
                $row['DateSubjectFall'],
                $row['SubjectEN'] . " Lecturer: " . $row['LecturerEN']
            ];
        }
        $data[] = $rowData;
    }

    $sheet->fromArray($data, NULL, 'A2');

    // Save the file
    $writer = new Xlsx($spreadsheet);
    $writer->save('student_subject_fail_report.xlsx');

    // Optional: Send the file to the browser for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="student_subject_fail_report.xlsx"');
    $writer->save('php://output');
}
?>


<button type="button" class="btn btn-success btn-sm" onClick="printModal()">Print</button>
 

