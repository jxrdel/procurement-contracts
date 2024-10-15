<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalCompanyController extends Controller
{
    public function index()
    {
        return view('external_companies.index');
    }

}
