<?php

namespace App\Http\Controllers;

// use App\Models\Product;

use App\Models\Slider;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $roomcount = Room::where('status_ketersediaan', 'ada')->count();
        $usercount = User::where('role_id', 3)->count();
        $transactioncount1 = Transaction::where('jenis', 'pemasukan')
            ->where('status_bayar', 'belum bayar')
            ->whereIn('status_order', ['pending', 'terima'])
            ->count();
        $transactioncount2 = Transaction::where('jenis', 'pemasukan')
            ->where('status_bayar', 'belum bayar')
            ->where('penyewa_id', Auth::id())
            ->count();
        $users = User::all();
        return view('dashboard', compact('roomcount', 'usercount', 'transactioncount1','transactioncount2', 'users'));
    }
}
