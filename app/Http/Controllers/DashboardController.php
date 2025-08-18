<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function ViewDashboard(){
    // If checks pass, show admin dashboard
    return view('admin.dashboard');
    }
}
