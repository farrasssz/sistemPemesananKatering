<?php

namespace App\Http\Controllers;

use App\Models\Biodata;

class DashboardController extends Controller
{
    public function index()
    {
        $total  = Biodata::count();
        $terbaru = Biodata::latest()->take(5)->get();

        return view('dashboard', compact('total', 'terbaru'));
    }
}
