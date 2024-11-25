<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class Controller
{
    public function index()
    {
        return view('home');
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
