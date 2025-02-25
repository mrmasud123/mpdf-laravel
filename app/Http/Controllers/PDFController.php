<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    public function generatePDF(){


        $html = view('report');

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);

        $mpdf->allow_charset_conversion = true;

        $mpdf->SetTitle('Consolidate Report-'. time());

        $mpdf->setAutoTopMargin = 'stretch';

        $mpdf->setAutoBottomMargin = 'stretch';

        $mpdf->setFooter('Page {PAGENO} of {nb}');

        $mpdf->WriteHTML($html);
        
        $mpdf->Output("Proyas Report-".time().".pdf", 'D');
    }

    public function viewData(){
        $empData=Employee::all();
        return view('dbdata', compact('empData'));
    }

    public function downloadEmployeePDF(){
        $empData=Employee::all();
        $html = view('employee-data', compact('empData'));
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);

        $mpdf->setAutoTopMargin = 'stretch';

        $mpdf->setAutoBottomMargin = 'stretch';

        $mpdf->WriteHTML($html);

        $mpdf->Output("Proyas Employee Report-".time().".pdf", 'I');
    }
}


