<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ExternalCompanyController;
use App\Http\Controllers\ExternalContactController;
use App\Http\Controllers\PurchaseController;
use App\Livewire\CreateExternalCompany;
use App\Livewire\CreatePurchase;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index'])->name('/');

Route::get('/external-companies', [ExternalCompanyController::class, 'index'])->name('external-companies.index');
Route::get('/external-companies/create', CreateExternalCompany::class)->name('external-companies.create');

Route::get('/external-contacts', [ExternalContactController::class, 'index'])->name('external-contacts.index');
Route::get('/getexternalcontacts', [ExternalContactController::class, 'getExternalContacts'])->name('getexternalcontacts');

Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
Route::get('/purchases/create', CreatePurchase::class)->name('purchases.create');