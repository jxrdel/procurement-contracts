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
        $contacts = ExternalContact::select([
            'external_contacts.id',
            'external_contacts.fname',
            'external_contacts.lname',
            'external_contacts.phone1',
            'external_contacts.email',
            'external_companies.name as company_name' // Alias for the company name
        ])
            ->leftJoin('external_companies', 'external_contacts.external_company_id', '=', 'external_companies.id'); // Join to get company name

        return DataTables::of($contacts)->make(true);
    }
}
