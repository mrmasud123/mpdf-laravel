<?php

namespace App\Http\Controllers;

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
        
        $mpdf->Output();
    }
}
