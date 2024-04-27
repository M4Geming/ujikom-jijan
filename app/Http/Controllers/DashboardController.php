<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Produk;
use App\Models\User;

// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::count();
        $user = User::count();
        $member = Member::count();

        return view('menuAdmin.dashboard', compact("produk", "user", "member"));
    }
}
