<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated($request, $user)
{
    if ($user->type === 'admin') {
        return redirect('/admin/dashboard');
    } elseif ($user->type === 'manager') {
        return redirect('/manager/dashboard');
    }
    return redirect('/user/dashboard');
}
}
