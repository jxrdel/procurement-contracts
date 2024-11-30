<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\PurchaseContract;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class Controller
{
    public function index()
    {
        //Get count of all purchase contracts
        $allpurchasecontractsCount = PurchaseContract::all()->count();
        // Get Purchase Contracts ending in the next 12 months
        $nexttwelvemonths = date('Y-m-d', strtotime('+12 months'));
        $nexttwelvemonths = PurchaseContract::where('end_date', '<=', $nexttwelvemonths)->get();

        //Get Purchase Contracts ending in the next 6 months
        $nextsixmonths = date('Y-m-d', strtotime('+6 months'));
        $nextsixmonths = PurchaseContract::where('end_date', '<=', $nextsixmonths)->get();

        //Get Purchase Contracts ending in the next 3 months
        $nextthreemonths = date('Y-m-d', strtotime('+3 months'));
        $nextthreemonths = PurchaseContract::where('end_date', '<=', $nextthreemonths)->get();
        return view('dashboard', compact('allpurchasecontractsCount', 'nexttwelvemonths', 'nextsixmonths', 'nextthreemonths'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
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

    public function users()
    {
        Gate::authorize('view-users-page');
        return view('users');
    }

    public function getUsers()
    {
        Gate::authorize('view-users-page');
        $users = User::with('role')->get();

        return DataTables::of($users)
            ->addColumn('role_name', function ($user) {
                return $user->role ? $user->role->name : 'N/A';
            })
            ->make(true);
    }
}
