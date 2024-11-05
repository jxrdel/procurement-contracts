<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ExternalCompanyController;
use App\Http\Controllers\ExternalContactController;
use App\Http\Controllers\PurchaseController;
use App\Livewire\CreateExternalCompany;
use App\Livewire\CreatePurchase;
use App\Livewire\CreatePurchaseContract;
use App\Livewire\ViewExternalCompany;
use App\Livewire\ViewPurchase;
use App\Livewire\ViewPurchaseContract;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index'])->name('/');

Route::get('/external-companies', [ExternalCompanyController::class, 'index'])->name('external-companies.index');
Route::get('/external-companies/create', CreateExternalCompany::class)->name('external-companies.create');
Route::get('/getexternalcompanies', [ExternalCompanyController::class, 'getExternalCompanies'])->name('getexternalcompanies');
Route::get('/external-companies/view/{id}', ViewExternalCompany::class)->name('external-companies.view');

Route::get('/external-contacts', [ExternalContactController::class, 'index'])->name('external-contacts.index');
Route::get('/getexternalcontacts', [ExternalContactController::class, 'getExternalContacts'])->name('getexternalcontacts');

Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
Route::get('/purchases/create', CreatePurchase::class)->name('purchases.create');
Route::get('/getpurchases', [PurchaseController::class, 'getPurchases'])->name('getpurchases');
Route::get('/purchases/view/{id}', ViewPurchase::class)->name('purchases.view');

Route::get('/purchase-contracts', [PurchaseController::class, 'purchaseContracts'])->name('purchase-contracts.index');
Route::get('/purchase-contracts/create', CreatePurchaseContract::class)->name('purchase-contracts.create');
Route::get('/getpurchasecontracts', [PurchaseController::class, 'getPurchaseContracts'])->name('getpurchasecontracts');
Route::get('/purchase-contracts/view/{id}', ViewPurchaseContract::class)->name('purchase-contracts.view');

Route::get('/notifications', [Controller::class, 'notifications'])->name('notifications.index');
Route::get('/getnotifications', [Controller::class, 'getNotifications'])->name('getnotifications');
