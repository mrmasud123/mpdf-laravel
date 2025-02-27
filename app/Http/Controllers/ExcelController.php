<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use Illuminate\Support\Facades\View;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XLXS;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExcelController extends Controller
{
    public function excel(){
        $spreadSheet=new Spreadsheet();
        $sheet=$spreadSheet->getActiveSheet();
        $sheet->mergeCells('A1:K1');
        $sheet->mergeCells('A2:K2');
        $sheet->mergeCells('A3:K3');
        $sheet->setCellValue('A1', 'Proyas Employee Report');
        $sheet->setCellValue('A2', 'Office Code : 0001, Name : Unit-01 Gobratala Report');
        $sheet->setCellValue('A3', 'Savings Statement');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('A4:C5');
        $sheet->setCellValue('A4', 'Programs');
        $sheet->getStyle('A4')->getFont()->setBold(true);

        $sheet->mergeCells('D4:F4');
        $sheet->setCellValue('D4', 'Samities');
        $sheet->getStyle('D4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D4')->getFont()->setBold(true);
        $sheet->setCellValue('D5', 'Male');
        $sheet->setCellValue('E5', 'Female');
        $sheet->setCellValue('F5', 'Total');
        $sheet->getStyle('D5')->getFont()->setBold(true);
        $sheet->getStyle('E5')->getFont()->setBold(true);
        $sheet->getStyle('F5')->getFont()->setBold(true);

        $sheet->mergeCells('G4:I4');
        $sheet->setCellValue('G4', 'Members');
        $sheet->getStyle('G4')->getFont()->setBold(true);
        $sheet->getStyle('D4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('G5', 'Male');
        $sheet->setCellValue('H5', 'Female');
        $sheet->setCellValue('I5', 'Total');
        $sheet->getStyle('G5')->getFont()->setBold(true);
        $sheet->getStyle('H5')->getFont()->setBold(true);
        $sheet->getStyle('I5')->getFont()->setBold(true);

        $arr=['D','E','F','G','H','I'];
        $data=[
            "Jagoron","Agrosor","Jagoron","Buniad","ENRICH","LEPIG","Proyas SME","Agrosor- SMART Loan","Agrosor-MFCE Loan","Agrosor-Raise Loan","Agrosor-SEP Loan","Common Service Loan-SEP","ECCCP-Drought Loan","KGF Loan","Lift Loan","Sufolon Loan"
        ];

        for($a=6; $a<=15; $a++){
            $sheet->mergeCells('A'.$a.':C'.$a);
            $sheet->setCellValue('A'.$a, $data[$a]);
            $sheet->getStyle('A'.$a)->getFont()->setBold(true);
            for($c=0; $c<6; $c++){
                $sheet->setCellValue($arr[$c].$a, '50');
            }
        }
        $file=new XLXS($spreadSheet);
        $file->save('proyas-report'.time().'.xlsx');
        return response()->download('proyas-report'.time().'.xlsx');
    }
    
}
