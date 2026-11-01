<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Tampilkan data pendaftar pada dashboard admin.
     */
    public function index(): View
    {
        $registrations = Registration::latest()->get();

        return view('admin.dashboard', compact('registrations'));
    }
}
