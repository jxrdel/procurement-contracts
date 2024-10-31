<?php

namespace App\Http\Controllers;

use App\Models\ExternalCompany;
use Illuminate\Http\Request;

class ExternalCompanyController extends Controller
{
    public function index()
    {
        $companies = ExternalCompany::all();
        return view('external_companies.index', compact('companies'));
    }

}
