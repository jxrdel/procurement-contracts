<?php

namespace App\Http\Controllers;

use App\Models\ExternalCompany;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ExternalCompanyController extends Controller
{
    public function index()
    {
        $companies = ExternalCompany::all();
        return view('external_companies.index', compact('companies'));
    }

    public function getExternalCompanies()
    {
        $companies = ExternalCompany::all();
        return DataTables::of($companies)->make(true);
    }
}
