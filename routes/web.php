<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoiceStatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return redirect('/index');
// });

Route::group(['prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

        //  !(App\Models\User::count() > 0) check if users table is empty or not for one time register only
        Auth::routes(['register'=>!(App\Models\User::count() > 0)]);

        Route::group(['middleware'=> 'auth:web'],function (){

            Route::resource('/invoices', InvoiceController::class);
            Route::get('/paied', [InvoiceStatusController::class,'paiedInvoices']);
            Route::get('/unpaied', [InvoiceStatusController::class,'unpaiedInvoices']);
            Route::get('/partialy', [InvoiceStatusController::class,'partialyPaiedInvoices']);
            Route::get('/print/{id}', [InvoiceStatusController::class,'printInvoice'])->name('print.invoice');
            Route::resource('/sections', SectionController::class)->except(['create']);
            Route::resource('/products', ProductController::class)->except(['create','show']);
            Route::resource('/invoice-attachment', InvoicesAttachmentsController::class);
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('/{page}', function ($page) {
                return view($page);
            });
        });


    });

