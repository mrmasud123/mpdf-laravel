<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TestingMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

Route::get('/', function () {
    return view('index');
});
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');


Route::get('/view-data', [PDFController::class, 'viewData'])->name('view.data');
Route::get('/download-employee-pdf', [PDFController::class, 'downloadEmployeePDF'])->name('download.employee.pdf');

Route::get('employee/create', [PDFController::class, 'create'])->name('employee.create');
Route::post('employee/save', [PDFController::class, 'save'])->name('employee.save');

Route::get('employee/edit/{id}', [PDFController::class, 'edit'])->name('employee.edit');
Route::post('employee/update/{id}', [PDFController::class, 'update'])->name('employee.update');

Route::get('employee/delete/{id}', [PDFController::class, 'delete'])->name('employee.delete');
Route::get('employee/view/{id}', [PDFController::class, 'view'])->name('employee.view');
