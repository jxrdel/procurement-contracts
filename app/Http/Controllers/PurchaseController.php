<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseContract;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('purchases.index');
    }

    public function getPurchases()
    {
        $purchases = Purchase::with('company')->get();
        // dd($purchases);
        return DataTables::of($purchases)->make(true);
    }

    public function purchaseContracts()
    {
        return view('purchase_contracts.index');
    }

    public function getPurchaseContracts()
    {
        $purchases = PurchaseContract::with('purchase')->get();
        return DataTables::of($purchases)->make(true);
    }
}
