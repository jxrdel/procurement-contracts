<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalContactController extends Controller
{
    public function index()
    {
        return view('external_contacts.index');
    }
}
