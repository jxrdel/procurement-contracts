<?php

namespace App\Http\Controllers;

use App\Models\ExternalContact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ExternalContactController extends Controller
{
    public function index()
    {
        $contacts = ExternalContact::all();
        return view('external_contacts.index', compact('contacts'));
    }

    public function getExternalContacts()
    {
        $contacts = ExternalContact::all();
        return DataTables::of($contacts)->make(true);
    }
}
