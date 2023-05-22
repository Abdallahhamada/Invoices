<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoiceStatusController;
use App\Http\Controllers\PermessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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


        Auth::routes(['register'=>false]);

        Route::group(['middleware'=> 'auth:web'],function (){

            Route::resource('/invoices', InvoiceController::class);
            Route::resource('/users', UserController::class)->except(['create','show']);
            Route::resource('/permissions', PermessionController::class)->except(['create']);
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

