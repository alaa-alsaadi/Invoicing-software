<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\GeneralController;

Route::get('/', function () {
    return view('welcome');
});
    // Route::get('change-language/{locale}', [GeneralController::class, 'changeLanguage'])->name('change_locale');
    Route::get('invoice/print/{id}', [InvoiceController::class, 'print'])->name('invoice.print');   
    Route::get('invoice/pdf/{id}', [InvoiceController::class, 'pdf'])->name('invoice.pdf');   
    Route::get('invoice/send_to_email/{id}', [InvoiceController::class, 'send_to_email'])->name('invoice.send_to_email');   

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('invoice', [InvoiceController::class, 'store'])->name('inovice.store');
    Route::get('invoice/{show}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::put('invoice/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::delete('invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
    Route::get('invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');

});







// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
