<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use Illuminate\Support\Facades\View;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XLXS;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PDFController extends Controller
{
    public function generatePDF(){


        $html = view('report');

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);

        $mpdf->allow_charset_conversion = true;

        $mpdf->setAutoTopMargin = 'stretch';

        $mpdf->setAutoBottomMargin = 'stretch';

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

    public function create(){
        return view('add-employee');
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email',
            'phone' => 'required|numeric|unique:employees,phone_number',
            'project' => 'required',
        ]);

        $emp = new Employee();
        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->project_name = $request->project;
        $emp->phone_number = $request->phone;
        $emp->save();

        return redirect()->route('view.data')->with('success', 'Employee added successfully');
    }
    public function edit(Request $request){
        $id=$request->id;       
        $empData=Employee::find($id);
        return view('edit-employee', compact('empData'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email,'.$request->id,
            'phone' => 'required|numeric|unique:employees,phone_number,'.$request->id,
            'project' => 'required',
        ]);      
        $empData=Employee::find($request->id);
        $empData->name = $request->name;
        $empData->email = $request->email;
        $empData->project_name = $request->project;
        $empData->phone_number = $request->phone;
        $empData->save();
        return redirect()->route('view.data')->with('success', 'Employee updated successfully');
    }
    public function delete(Request $request){
        $id=$request->id;
        $empData=Employee::find($id);
        if(!empty($empData)){
            $empData->delete();
            return redirect()->route('view.data')->with('success', 'Employee deleted successfully');
        }
    }
    public function view(Request $request){
        $id=$request->id;
        $empData=Employee::find($id);
        return view('single-employee', compact('empData'));
    }

    public function pdf(){

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);

        $html = view('report');

        $mpdf->allow_charset_conversion = true;
        $mpdf->setAutoTopMargin = 'stretch';

        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->WriteHTML($html);

        $pdfContent = $mpdf->Output('', 'S');

        return response($pdfContent)->header('Content-Type', 'application/pdf');
    }

    
    
}