<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/view-data', [PDFController::class, 'viewData'])->name('view.data');
Route::get('/download-employee-pdf', [PDFController::class, 'downloadEmployeePDF'])->name('download.employee.pdf');