<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ExternalCompanyController;
use App\Http\Controllers\ExternalContactController;
use App\Livewire\CreateExternalCompany;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index'])->name('/');

Route::get('/external-companies', [ExternalCompanyController::class, 'index'])->name('external-companies.index');

Route::get('/external-contacts', [ExternalContactController::class, 'index'])->name('external-contacts.index');
Route::get('/external-companies/create', CreateExternalCompany::class)->name('external-companies.create');