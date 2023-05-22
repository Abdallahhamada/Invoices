<?php

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Section;

// helper function returns invoices count
function invoicesCount (){
    return Invoice::count();
}

// helper function returns paied invoices count
function paiedInvoicesCount (){
    return Invoice::where('status',1)->count();
}

// helper function returns unpaied invoices count
function unpaidInvoicesCount (){
    return Invoice::where('status',3)->count();
}

// helper function returns partialy paied invoices count
function partialyPaidInvoicesCount (){
    return Invoice::where('status',2)->count();
}

// helper function returns products count
function productsCount (){
    return Product::count();
}

// helper function returns sections count
function sectionsCount (){
    return Section::count();
}

