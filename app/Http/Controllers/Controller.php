<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Yajra\DataTables\DataTables;

class Controller
{
    public function index()
    {
        return view('home');
    }

    public function notifications()
    {
        return view('notifications.index');
    }

    public function getNotifications()
    {
        // Load notifications along with their associated purchase contract and purchase
        $notifications = Notification::with('purchaseContract.purchase')->get();

        return DataTables::of($notifications)
            ->addColumn('purchase_name', function ($notification) {
                return $notification->purchaseContract->purchase->name ?? 'N/A';
            })
            ->addColumn('display_date', function ($notification) {
                return $notification->display_date;
            })
            ->make(true);
    }
}
